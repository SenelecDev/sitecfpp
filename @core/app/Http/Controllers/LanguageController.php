<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\ContactInfoItem;
use App\Counterup;
use App\Faq;
use App\HeaderSlider;
use App\KeyFeatures;
use App\Language;
use App\Menu;
use App\Page;
use App\PricePlan;
use App\ServiceCategory;
use App\Services;
use App\StaticOption;
use App\SupportInfo;
use App\TeamMember;
use App\Testimonial;
use App\Works;
use App\WorksCategory;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_lang = Language::all();
        return view('backend.languages.index')->with([
            'all_lang' => $all_lang
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string:max:191',
            'direction' => 'required|string:max:191',
            'slug' => 'required|string:max:191',
            'status' => 'required|string:max:191',
        ]);

        Language::create([
            'name' => $request->name,
            'direction' => $request->direction,
            'slug' => $request->slug,
            'status' => $request->status,
            'default' => 0
        ]);

        //generate admin panel string
        $backend_default_lang_data = file_get_contents(resource_path('lang') . '/backend_default.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_backend.json', $backend_default_lang_data);
        //generate frontend sting
        $frontend_default_lang_data = file_get_contents(resource_path('lang') . '/frontend_default.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_frontend.json', $frontend_default_lang_data);


        return redirect()->back()->with([
            'msg' => __('New Language Added Success...'),
            'type' => 'success'
        ]);
    }

    public function backend_edit_words($slug)
    {
        $all_word = file_get_contents(resource_path('lang/') . $slug . '_backend.json');
        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $slug,
            'type' => 'backend'
        ]);
    }
    public function frontend_edit_words($slug)
    {
        $all_word = file_get_contents(resource_path('lang/') . $slug . '_frontend.json');
        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $slug,
            'type' => 'frontend'
        ]);
    }

    public function update_words(Request $request, $id)
    {
        $lang = Language::where('slug', $id)->first();
        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->with(['msg' => __('Please fill one minimum one field'), 'type' => 'danger']);
        }
        file_put_contents(resource_path('lang/') . $lang->slug .'_'.$request->type. '.json', $content);
        return back()->with(['msg' => __('Words Change Success'), 'type' => 'success']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string:max:191',
            'direction' => 'required|string:max:191',
            'status' => 'required|string:max:191',
            'slug' => 'required|string:max:191'
        ]);
        Language::where('id', $request->id)->update([
            'name' => $request->name,
            'direction' => $request->direction,
            'status' => $request->status,
            'slug' => $request->slug
        ]);
        $backend_lang_file_path = resource_path('lang/') . $request->slug .'_backend.json';
        $frontend_lang_file_path = resource_path('lang/')  . $request->slug .'_frontend.json';
        if (!file_exists($backend_lang_file_path)){
            file_put_contents(resource_path('lang/') . $request->slug . '_backend.json', file_get_contents(resource_path('lang/').'backend_default.json'));
        }
        if (!file_exists($frontend_lang_file_path)){
            file_put_contents(resource_path('lang/') . $request->slug .'_frontend.json', file_get_contents(resource_path('lang/').'frontend_default.json'));
        }

        return redirect()->back()->with([
            'msg' => __('Language Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $lang = Language::find($id);

        $all_static_option = StaticOption::where('option_name', 'regexp', '_' . $lang->slug . '_')->get();

        foreach ($all_static_option as $option) {
            StaticOption::find($option->id)->delete();
        }
        HeaderSlider::where('lang', $lang->slug)->delete();
        KeyFeatures::where('lang', $lang->slug)->delete();
        ContactInfoItem::where('lang', $lang->slug)->delete();
        SupportInfo::where('lang', $lang->slug)->delete();
        ServiceCategory::where('lang', $lang->slug)->delete();
        Services::where('lang', $lang->slug)->delete();
        WorksCategory::where('lang', $lang->slug)->delete();
        Works::where('lang', $lang->slug)->delete();
        Faq::where('lang', $lang->slug)->delete();
        PricePlan::where('lang', $lang->slug)->delete();
        TeamMember::where('lang', $lang->slug)->delete();
        Testimonial::where('lang', $lang->slug)->delete();
        Counterup::where('lang', $lang->slug)->delete();
        BlogCategory::where('lang', $lang->slug)->delete();
        Blog::where('lang', $lang->slug)->delete();
        Menu::where('lang', $lang->slug)->delete();
        Page::where('lang', $lang->slug)->delete();
        $lang->delete();

        if (file_exists(resource_path('lang/') . $lang->slug . '_backend.json')){
            unlink(resource_path('lang/') . $lang->slug . '_backend.json');
        }
        if (file_exists(resource_path('lang/') . $lang->slug . '_frontend.json')){
            unlink(resource_path('lang/') . $lang->slug . '_frontend.json');
        }

        return redirect()->back()->with([
            'msg' => __('Language Delete Success...'),
            'type' => 'danger'
        ]);

    }

    public function make_default(Request $request, $id)
    {
        Language::where('default', 1)->update(['default' => 0]);
        Language::find($id)->update(['default' => 1]);
        $lang = Language::find($id);
        $lang->default = 1;
        $lang->save();
        session()->put('lang', $lang->slug);
        return redirect()->back()->with([
            'msg' => __('Default Language Set To') . ' ' . $lang->name,
            'type' => 'success'
        ]);
    }

    public function clone_languages(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|string',
            'direction' => 'required|string',
            'status' => 'required|string',
            'slug' => 'required|string',
        ]);

        $clone_lang = Language::find($request->id);
        Language::create([
            'name' => $request->name,
            'direction' => $request->direction,
            'slug' => $request->slug,
            'status' => $request->status,
            'default' => 0
        ]);

        $search_term = '_' . $clone_lang->slug . '_';
        $all_static_option = StaticOption::where('option_name', 'regexp', $search_term)->get();
        foreach ($all_static_option as $option) {
            $option_name = str_replace($search_term, '_' . $request->slug . '_', $option->option_name);
            StaticOption::create([
                'option_name' => $option_name,
                'option_value' => $option->option_value
            ]);
        }

        $header_slider = HeaderSlider::where('lang', $clone_lang->slug)->get();
        foreach ($header_slider as $data){
            HeaderSlider::create([
                'title' => $data->title,
                'description' => $data->description,
                'btn_01_status' => $data->btn_01_status,
                'btn_01_text' => $data->btn_01_text,
                'btn_01_url' => $data->btn_01_url,
                'lang' => $request->slug,
                'image' => $data->image,
            ]);
        }

       $key_features =  KeyFeatures::where('lang', $clone_lang->slug)->get();
        foreach ($key_features as $data){
            KeyFeatures::create([
               'title' =>  $data->title,
               'icon' =>  $data->icon,
               'image' =>  $data->image,
               'description' =>  $data->description,
               'lang' =>  $request->slug
            ]);
        }

        $contact_info = ContactInfoItem::where('lang', $clone_lang->slug)->get();
        foreach ($contact_info as $data){
           ContactInfoItem::create([
               'title' => $data->title,
               'lang' => $request->slug,
               'icon' => $data->icon,
               'description' => $data->description
           ]);
        }

       $support_info =  SupportInfo::where('lang', $clone_lang->slug)->get();
        foreach ($support_info as $data){
            SupportInfo::create([
                'title' => $data->title,
                'lang' => $request->slug,
                'icon' => $data->icon,
                'details' => $data->details
            ]);
        }

        $pages = Page::where('lang', $clone_lang->slug)->get();
        foreach ($pages as $data){
            Page::create([
                'title' => $data->title,
                'content' => $data->content,
                'status' => $data->status,
                'meta_description' => $data->meta_description,
                'meta_tags' => $data->meta_tags,
                'slug' => $data->slug.'-'.$request->slug,
                'lang' => $request->slug,
            ]);
        }

        $menus = Menu::where('lang', $clone_lang->slug)->get();
        foreach ($menus as $data){
            $menu_content = $data->content;
            $menu_content = str_replace($search_term,'_'.$request->slug.'_',$menu_content);
            Menu::create([
                'title' => $data->title,
                'lang' => $request->slug,
                'content' => $menu_content,
                'status' => $data->status
            ]);
        }


        //generate admin panel string
        $backend_default_lang_data = file_get_contents(resource_path('lang') . '/'.$clone_lang->slug.'_backend.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_backend.json', $backend_default_lang_data);
        //generate frontend sting
        $frontend_default_lang_data = file_get_contents(resource_path('lang') . '/'.$clone_lang->slug.'_frontend.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_frontend.json', $frontend_default_lang_data);

        return redirect()->back()->with([
            'msg' => __('Language clone success with content...'),
            'type' => 'success'
        ]);
    }

    public function add_new_string(Request $request){
        $this->validate($request,[
           'slug' => 'required',
           'string' => 'required',
           'translate_string' => 'required',
        ]);

        if (file_exists(resource_path('lang/') . $request->slug .'_'.$request->type. '.json')){
            $default_lang_data = file_get_contents(resource_path('lang').'/'.$request->slug.'_'.$request->type.'.json');
            $default_lang_data = (array) json_decode($default_lang_data);
            $default_lang_data[$request->string] = $request->translate_string;
            $default_lang_data = (object) $default_lang_data;
            $default_lang_data =   json_encode($default_lang_data);
            file_put_contents(resource_path('lang/') . $request->slug .'_'.$request->type. '.json', $default_lang_data);
        }

        return redirect()->back()->with([
            'msg' => __('new translated string added..'),
            'type' => 'success'
        ]);
    }

}
