<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\PaymentLogs;
use App\ContactInfoItem;
use App\Faq;
use App\Language;
use App\Quote;
use App\Menu;
use App\Newsletter;
use App\Page;
use App\ServiceCategory;
use App\Services;
use App\Blog;
use App\BlogCategory;
use App\Brand;
use App\HeaderSlider;
use App\KeyFeatures;
use App\PricePlan;
use App\TeamMember;
use App\User;
use App\Counterup;
use App\Testimonial;
use App\Works;
use PDF;
use App\WorksCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use App\Mail\UserResetEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\RequestQuote;
use App\Mail\BasicMailTemplate;


class FrontendController extends Controller
{

    public function index(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_header_slider = HeaderSlider::where('lang',$lang)->get();
        $all_counterup = Counterup::where('lang',$lang)->get();
        $all_key_features = KeyFeatures::where('lang',$lang)->get();
        $all_service = Services::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('home_page_01_service_area_items'))->get();
        $all_testimonial = Testimonial::where('lang',$lang)->get();
        $all_price_plan = PricePlan::where([ 'lang' => $lang])->orderBy('id','desc')->take(get_static_option('home_page_01_price_plan_section_items'))->get();;
        $all_team_members = TeamMember::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('home_page_01_team_member_section_items'))->get();;
        $all_brand_logo = Brand::all();
        $all_work = Works::where('lang',$lang)->get();
        $all_work_category = WorksCategory::where(['status'=> 'publish', 'lang' => $lang])->get();
        $all_blog = Blog::where('lang',$lang)->orderBy('id','desc')->take(3)->get();

        return view('frontend.frontend-home')->with([
            'all_header_slider' => $all_header_slider,
            'all_counterup' => $all_counterup,
            'all_key_features' => $all_key_features,
            'all_service' => $all_service,
            'all_testimonial' => $all_testimonial,
            'all_blog' => $all_blog,
            'all_price_plan' => $all_price_plan,
            'all_team_members' => $all_team_members,
            'all_brand_logo' => $all_brand_logo,
            'all_work' => $all_work,
            'all_work_category' => $all_work_category
        ]);
    }
    public function home_page_change($id){

        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_header_slider = HeaderSlider::where('lang',$lang)->get();
        $all_counterup = Counterup::where('lang',$lang)->get();
        $all_key_features = KeyFeatures::where('lang',$lang)->get();
        $all_service = Services::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('home_page_01_service_area_items'))->get();
        $all_testimonial = Testimonial::where('lang',$lang)->get();
        $all_price_plan = PricePlan::where([ 'lang' => $lang])->orderBy('id','desc')->take(get_static_option('home_page_01_price_plan_section_items'))->get();;
        $all_team_members = TeamMember::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('home_page_01_team_member_section_items'))->get();;
        $all_brand_logo = Brand::all();
        $all_work = Works::where('lang',$lang)->get();
        $all_work_category = WorksCategory::where(['status'=> 'publish', 'lang' => $lang])->get();
        $all_blog = Blog::where('lang',$lang)->orderBy('id','desc')->take(3)->get();

        return view('frontend.frontend-home-demo')->with([
            'all_header_slider' => $all_header_slider,
            'all_counterup' => $all_counterup,
            'all_key_features' => $all_key_features,
            'all_service' => $all_service,
            'all_testimonial' => $all_testimonial,
            'all_blog' => $all_blog,
            'all_price_plan' => $all_price_plan,
            'all_team_members' => $all_team_members,
            'all_brand_logo' => $all_brand_logo,
            'all_work' => $all_work,
            'all_work_category' => $all_work_category,
            'home_page' => $id,
        ]);
    }


    public function blog_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_recent_blogs = Blog::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_blogs = Blog::where('lang',$lang)->orderBy('id','desc')->paginate(get_static_option('blog_page_item'));
        $all_category = BlogCategory::where(['status'=>'publish','lang' => $lang])->orderBy('id','desc')->get();
        return view('frontend.pages.blog')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }
    public function category_wise_blog_page($id){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_blogs = Blog::where(['blog_categories_id' => $id,'lang' => $lang])->orderBy('id','desc')->paginate(get_static_option('blog_page_item'));
        $all_recent_blogs = Blog::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status'=>'publish','lang' => $lang])->orderBy('id','desc')->get();
        $category_name = BlogCategory::where(['id'=>$id,'status' => 'publish'])->first()->name;
        return view('frontend.pages.blog-category')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'category_name' => $category_name,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }
    public function blog_search_page(Request $request){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_recent_blogs = Blog::where('lang',$lang)->orderBy('id','desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status'=>'publish','lang' => $lang])->orderBy('id','desc')->get();
        $all_blogs = Blog::where('title','LIKE','%'.$request->search.'%')
            ->orWhere('content','LIKE','%'.$request->search.'%')
            ->orWhere('tags','LIKE','%'.$request->search.'%')
            ->orderBy('id','desc')->paginate(get_static_option('blog_page_item'));

        return view('frontend.pages.blog-search')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'search_term' => $request->search,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }

    public function blog_single_page($id,$any){

        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $blog_post = Blog::findOrFail($id);
        $all_recent_blogs = Blog::where(['lang'=>$lang])->orderBy('id','desc')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $all_category = BlogCategory::where(['status'=>'publish','lang' => $lang])->orderBy('id','desc')->get();

        return view('frontend.pages.blog-single')->with([
            'blog_post' => $blog_post,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs
        ]);
    }

    public function service_single_page($id,$any){
        $service_post = Services::findOrFail($id);

        return view('frontend.pages.blog-single')->with([
            'service_post' => $service_post
        ]);
    }

    public function dynamic_single_page($id,$any){
        $page_post = Page::findOrFail($id);
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        return view('frontend.pages.dynamic-single')->with([
            'page_post' => $page_post
        ]);
    }

    public function showAdminForgetPasswordForm(){
        return view('auth.admin.forget-password');
    }

    public function sendAdminForgetPasswordMail(Request $request){
        $this->validate($request,[
           'username' => 'required|string:max:191'
        ]);
        $user_info = Admin::where('username',$request->username)->orWhere('email',$request->username)->first();
        $token_id = Str::random(30);
        $existing_token = DB::table('password_resets')->where('email',$user_info->email)->delete();
        if (empty($existing_token)){
            DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
        }

        $message = __('Hello').' '.$user_info->username.'<br>';
        $message .= __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') .'<a style="background-color:#444;color:#fff;text-decoration:none;padding: 10px 15px;border-radius: 3px;display: block;width: 130px;margin-top: 20px;" href="'.route('admin.reset.password',['user'=>$user_info->username,'token' => $token_id]).'">'.__('Click Reset Password').'</a>';

        Mail::to($user_info->email)->send(new BasicMailTemplate([
            'subject' => __('Reset Your Password'),
            'message' => $message
        ]));
        if (!Mail::failures()){
            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Something Wrong, Please Try Again!!'),
            'type' => 'danger'
        ]);
    }

    public function showAdminResetPasswordForm($username,$token){
        return view('auth.admin.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }
    public function AdminResetPassword(Request $request){
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = Admin::where('username',$request->username)->first();
        $user = Admin::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email,'token' => $request->token])->first();
        if (!empty($token_iinfo)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login')->with(['msg'=> __('Password Changed Successfully') ,'type'=> 'success']);
        }

        return redirect()->back()->with(['msg'=> __('Somethings Going Wrong! Please Try Again or Check Your Old Password'),'type'=> 'danger']);
    }

    public function lang_change(Request $request){
        session()->put('lang', $request->lang);
        return redirect()->route('homepage');
    }


    public function send_contact_message(Request $request)
    {
        $validated_data = $this->get_filtered_data_from_request(get_static_option('contact_page_contact_form_fields'), $request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];
        $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your contact!!');
      //  $success_message = 'contact_mail_' . get_default_language() . '_success_message';
        Mail::to(get_static_option('site_global_email'))->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('You Have Contact Message from') . ' ' . get_static_option('site_' . get_default_language() . '_title')));
        return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
    }

    public function services_single_page($id,$any){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $service_item = Services::findOrFail($id);
        $service_category = ServiceCategory::where(['status'=>'publish','lang' => $lang])->get();
        return view('frontend.pages.service-single')->with(['service_item' => $service_item,'service_category' => $service_category]);
    }

    public function category_wise_services_page($id,$any){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $category_name = ServiceCategory::findOrFail($id)->name;
        $service_item = Services::where(['categories_id'=>$id,'lang' => $lang])->paginate(6);
        return view('frontend.pages.services')->with(['service_items' => $service_item,'category_name' => $category_name]);
    }

    public function work_single_page($id,$any){
        $work_item = Works::findOrFail($id);
        return view('frontend.pages.work-single')->with(['work_item' => $work_item]);
    }

    public function about_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_counterup = Counterup::where('lang',$lang)->get();
        $all_brand_logo = Brand::all();
        $all_team_members = TeamMember::where('lang',$lang)->orderBy('id','desc')->take(4)->get();
        return view('frontend.pages.about')->with(['all_counterup' => $all_counterup,'all_brand_logo' => $all_brand_logo,'all_team_members' => $all_team_members]);
    }
    public function service_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_services = Services::where('lang',$lang)->orderBy('id','desc')->get();
        $all_price_plan = PricePlan::where('lang',$lang)->get();
        return view('frontend.pages.service')->with(['all_services' => $all_services,'all_price_plan' => $all_price_plan]);
    }
    public function work_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_work = Works::where(['lang' => $lang])->orderBy('id','desc')->paginate(12);
        $all_work_category = WorksCategory::where(['status' => 'publish', 'lang' => $lang])->get();
        return view('frontend.pages.work')->with(['all_work' => $all_work,'all_work_category' => $all_work_category]);
    }

    public function team_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_team_members = TeamMember::where('lang',$lang)->orderBy('id','desc')->paginate(get_static_option('team_page_team_member_section_item'));

        return view('frontend.pages.team-page')->with(['all_team_members' => $all_team_members]);
    }
    public function faq_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_faq = Faq::where('lang',$lang)->get();
        $all_brand_logo = Brand::all();
        $all_testimonial = Testimonial::where('lang',$lang)->get();
        return view('frontend.pages.faq-page')->with([
            'all_brand_logo' => $all_brand_logo,
            'all_testimonial' => $all_testimonial,
            'all_faqs' => $all_faq
        ]);
    }

    public function contact_page(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_contact_info = ContactInfoItem::where('lang',$lang)->get();
        return view('frontend.pages.contact-page')->with([
            'all_contact_info' => $all_contact_info
        ]);
    }
    public function plan_order($id){
        $order_details = PricePlan::find($id);
        return view('frontend.pages.order-page')->with([
            'order_details' => $order_details
        ]);
    }

    public function request_quote(){
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $contact_info = ContactInfoItem::where('lang',$lang)->get();
        return view('frontend.pages.quote-page')->with(['all_contact_info' => $contact_info]);
    }

    public function send_quote_message(Request $request)
{

    $all_quote_form_fields = json_decode(get_static_option('quote_page_form_fields'));
    $required_fields = [];
    $fileds_name = [];
    $attachment_list = [];
    foreach ($all_quote_form_fields->field_type as $key => $value) {
        if (is_object($all_quote_form_fields->field_required) && !empty($all_quote_form_fields->field_required->$key) && $value != 'file') {

            $sanitize_rule = ($value == 'email') ? 'email' : 'string';
            $required_fields[$all_quote_form_fields->field_name[$key]] = 'required|' . $sanitize_rule;

        } elseif (is_object($all_quote_form_fields->field_required) && $value == 'file') {

            $file_required = isset($all_quote_form_fields->field_required->$key) ? 'required|' : '';
            $file_mimes_type = isset($all_quote_form_fields->mimes_type->$key) ? $all_quote_form_fields->mimes_type->$key : '';
            $required_fields[$all_quote_form_fields->field_name[$key]] = $file_required . $file_mimes_type . '|max:6054';

        } elseif (is_array($all_quote_form_fields->field_required) && $value == 'file') {

            $file_required = isset($all_quote_form_fields->field_required->$key) ? 'required|' : '';
            $file_mimes_type = isset($all_quote_form_fields->mimes_type->$key) ? $all_quote_form_fields->mimes_type->$key : '';
            $required_fields[$all_quote_form_fields->field_name[$key]] = $file_required . $file_mimes_type . '|max:6054';

        } else if (is_array($all_quote_form_fields->field_required) && !empty($all_quote_form_fields->field_required[$key]) && $value != 'file') {

            $sanitize_rule = ($value == 'email') ? 'email' : 'string';
            $required_fields[$all_quote_form_fields->field_name[$key]] = 'required|' . $sanitize_rule;

        }
    }
    $this->validate($request, $required_fields);
    //have to insert quote data to database to show all quote in backend;
    $all_field_serialize_data = $request->all();
     unset($all_field_serialize_data['_token']);
     unset($all_field_serialize_data['captcha_token']);
    foreach($all_field_serialize_data as $field_name => $field_value){
        if ($request->hasFile($field_name)){
            unset($all_field_serialize_data[$field_name]);
        }
    }
    $quote_id = Quote::create([
        'custom_fields' => serialize($all_field_serialize_data),
        'status' => 'pending'
    ])->id;

    foreach ($all_quote_form_fields->field_type as $key => $value) {
        if ($value != 'file') {
            $singule_field_name = $all_quote_form_fields->field_name[$key];
            $checkbox_value = ($value == 'checkbox' && !empty($request->$singule_field_name)) ? 'Yes' : 'No';
            $fileds_name[$singule_field_name] = ($value != 'checkbox') ? $request->$singule_field_name : $checkbox_value;

        } elseif ($value == 'file') {
            $singule_field_name = $all_quote_form_fields->field_name[$key];
            if ($request->hasFile($singule_field_name)) {
                $filed_instance = $request->file($singule_field_name);
                $file_extenstion = $filed_instance->getClientOriginalExtension();
                $attachment_name = 'attachment-' . $quote_id .'-'.$singule_field_name. '.' . $file_extenstion;
                $filed_instance->move('assets/uploads/attachment/', $attachment_name);

                $attachment_list[$singule_field_name] = 'assets/uploads/attachment/' . $attachment_name;
            }
        }
    }

    Quote::find($quote_id)->update(['attachment' => serialize($attachment_list)]);
    //
     $google_captcha_result = google_captcha_check($request->captcha_token);
     if ($google_captcha_result['success']) {
        $succ_msg = get_static_option('quote_mail_' . get_user_lang() . '_subject');
        $success_message = !empty($succ_msg) ? $succ_msg : 'Thanks for your quote. we will get back to you very soon.';

        Mail::to(get_static_option('quote_page_form_mail'))->send(new RequestQuote($fileds_name, $attachment_list));

        return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);

     }

     return redirect()->back()->with(['msg' => 'Something went wrong, Please try again later !!', 'type' => 'danger']);

}


    public function send_order_message(Request $request)
    {
        $validated_data = $this->get_filtered_data_from_request(get_static_option('order_page_form_fields'),$request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];
        $package_detials = PricePlan::find($request->package);
        $order_id =Order::create([
            'custom_fields' => serialize($all_field_serialize_data),
            'attachment' => serialize($all_attachment),
            'status' => 'pending',
            'package_name' => $package_detials->title,
            'package_price' => $package_detials->price,
            'package_id' => $package_detials->id,
            'checkout_type' => !empty($request->checkout_type) ? $request->checkout_type : '',
            'user_id' => Auth::guard('web')->check() ? Auth::guard('web')->user()->id : 0,
        ])->id;
        if (!empty(get_static_option('site_payment_gateway'))) {
            return redirect()->route('frontend.order.confirm', $order_id);
        }
        $google_captcha_result = google_captcha_check($request->captcha_token);
        if ($google_captcha_result['success']) {
            $succ_msg = get_static_option('order_mail_' . get_user_lang() . '_success_message');
            $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your order. we will get back to you very soon.');
            $order_rmail = get_static_option('order_page_form_mail');
            $order_mail = $order_rmail ? $order_rmail : get_static_option('site_global_email');
            //have to set condition for redirect in payment page with payment information
            if (!empty(get_static_option('site_payment_gateway'))) {
                return redirect()->route('frontend.order.confirm', $order_id);
            }
            Mail::to($order_mail)->send(new BasicMail([
                'subject' => __('You have a package order from').' '.get_static_option('site_'.get_default_language().'_title'),
                'message' => '',
            ]));
            return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => __('Something goes wrong, Please try again later !!'), 'type' => 'danger']);
        }
    }

    public function subscribe_newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:191|unique:newsletters'
        ]);
        $verify_token = Str::random(32);
        Newsletter::create([
            'email' => $request->email,
            'verified' => 0,
            'verify_token' => $verify_token
        ]);
        $message = __('verify your email to get all news from '). get_static_option('site_'.get_default_language().'_title') . '<div class="btn-wrap"> <a class="anchor-btn" href="' . route('subscriber.verify', ['token' => $verify_token]) . '">' . __('verify email') . '</a></div>';
        $data = [
            'message' => $message,
            'subject' => __('verify your email')
        ];
        //send verify mail to newsletter subscriber
        Mail::to($request->email)->send(new BasicMailTemplate($data,__('Verify your email')));

        return response()->json([
            'msg' => __('Thanks for Subscribe Our Newsletter'),
            'type' => 'success'
        ]);
    }


      public function subscriber_verify(Request $request){
      Newsletter::where('verify_token',$request->token)->update([
          'verified' => 1
      ]);
      return view('frontend.thankyou');
    }


    public function showUserForgetPasswordForm()
    {
        return view('frontend.user.forget-password');
    }

    public function sendUserForgetPasswordMail(Request $request)
    {
      $this->validate($request, [
          'username' => 'required|string:max:191'
      ]);

    $user_info = User::where('username', $request->username)->orWhere('email', $request->username)->first();
    if (!empty($user_info)) {
        $token_id = Str::random(30);
        $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
        if (empty($existing_token)) {
            DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
        }
        $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') . ' <a class="btn" href="' . route('user.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">' . __('Click Reset Password') . '</a>';
        $data = [
            'username' => $user_info->username,
            'message' => $message
        ];
        Mail::to($user_info->email)->send(new UserResetEmail($data));

        return redirect()->back()->with([
            'msg' => __('Check Your Mail For Reset Password Link'),
            'type' => 'success'
        ]);
    }
    return redirect()->back()->with([
        'msg' => __('Your Username or Email Is Wrong!!!'),
        'type' => 'danger'
    ]);
}

public function showUserResetPasswordForm($username, $token)
{
  return view('frontend.user.reset-password')->with([
      'username' => $username,
      'token' => $token
  ]);
}

public function UserResetPassword(Request $request)
  {
    $this->validate($request, [
        'token' => 'required',
        'username' => 'required',
        'password' => 'required|string|min:8|confirmed'
    ]);
    $user_info = User::where('username', $request->username)->first();
    $user = User::findOrFail($user_info->id);
    $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
    if (!empty($token_iinfo)) {
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
    }

    return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
  }

  public function ajax_login(Request $request)
{
    $this->validate($request, [
        'username' => 'required|string',
        'password' => 'required|min:6'
    ], [
        'username.required'   => __('username required'),
        'password.required' => __('password required'),
        'password.min' => __('password length must be 6 characters')
    ]);
    if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password],
      $request->get('remember'))) {
        return response()->json([
            'msg' => __('login Success Redirecting'),
            'type' => 'danger',
            'status' => 'valid'
        ]);
    }
    return response()->json([
        'msg' => __('Username Or Password Doest Not Matched !!!'),
        'type' => 'danger',
        'status' => 'invalid'
    ]);
}

public function get_filtered_data_from_request($option_value,$request){
    $all_attachment = [];
    $all_quote_form_fields = (array) json_decode($option_value);
    $all_field_type = isset($all_quote_form_fields['field_type']) ? (array) $all_quote_form_fields['field_type'] : [];
    $all_field_name = isset($all_quote_form_fields['field_name']) ? $all_quote_form_fields['field_name'] : [];
    $all_field_required = isset($all_quote_form_fields['field_required'])  ? (object) $all_quote_form_fields['field_required'] : [];
    $all_field_mimes_type = isset($all_quote_form_fields['mimes_type']) ? (object) $all_quote_form_fields['mimes_type'] : [];
    //get field details from, form request
    $all_field_serialize_data = $request->all();
    unset($all_field_serialize_data['_token']);
    if (isset($all_field_serialize_data['captcha_token'])){
        unset($all_field_serialize_data['captcha_token']);
    }
    if (!empty($all_field_name)){
        foreach ($all_field_name as $index => $field){
            $is_required = !empty($all_field_required) && property_exists($all_field_required,$index) ? $all_field_required->$index : '';
            $mime_type = !empty($all_field_mimes_type) && property_exists($all_field_mimes_type,$index) ? $all_field_mimes_type->$index : '';
            $field_type = isset($all_field_type[$index]) ? $all_field_type[$index] : '';
            if (!empty($field_type) && $field_type == 'file'){
                unset($all_field_serialize_data[$field]);
            }
            $validation_rules = !empty($is_required) ? 'required|': '';
            $validation_rules .= !empty($mime_type) ? $mime_type : '';
            //validate field
            $this->validate($request,[
                $field => $validation_rules
            ]);
            if ($field_type == 'file' && $request->hasFile($field)) {
                $filed_instance = $request->file($field);
                $file_extenstion = $filed_instance->getClientOriginalExtension();
                $attachment_name = 'attachment-'.Str::random(32).'-'. $field .'.'. $file_extenstion;
                $filed_instance->move('assets/uploads/attachment/applicant', $attachment_name);
                $all_attachment[$field] = 'assets/uploads/attachment/applicant/' . $attachment_name;
            }
        }
    }
    return [
        'all_attachment' => $all_attachment,
        'field_data' => $all_field_serialize_data
    ];
}

public function order_confirm($id)
    {
        $order_details = Order::find($id);
        return view('frontend.payment.order-confirm')->with(['order_details' => $order_details]);
    }

    public function order_payment_success($id)
{
    $order_details = Order::find(substr($id,6,-6));
    return view('frontend.payment.payment-success')->with(['order_details' => $order_details]);
}

public function order_payment_cancel($id)
{
    $order_details = Order::find($id);
    return view('frontend.payment.payment-cancel')->with(['order_details' => $order_details]);
}
public function generate_package_invoice(Request $request)
{
    $payment_details = PaymentLogs::where(['order_id' => $request->id])->first();
    $order_details = Order::where(['id' => $request->id])->first();
    if (empty($order_details)) {
        return redirect_404_page();
    }
    $pdf = PDF::loadView('invoice.package-order', ['order_details' => $order_details, 'payment_details' => $payment_details]);
    return $pdf->download('package-invoice.pdf');
}

public function order_details($id)
{

    $order_details = Order::find($id);
    if(empty($order_details)){
        abort(404);
    }
    $package_details = PricePlan::find($order_details->package_id);
    $payment_details = PaymentLogs::where('order_id', $id)->first();
    return view('frontend.pages.package.view-order')->with(
        [
            'order_details' => $order_details,
            'package_details' => $package_details,
            'payment_details' => $payment_details,
        ]
    );
}

    public function order_payment_cancel_static()
    {
        return view('frontend.payment.payment-cancel-static');
    }

}//end class
