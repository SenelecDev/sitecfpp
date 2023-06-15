<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberEmail;
use App\Mail\BasicMailTemplate;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_subscriber = Newsletter::latest()->get();
        return view('backend.newsletter.index')->with(['all_subscriber' => $all_subscriber]);
    }

    public function send_mail(Request $request){

      $this->validate($request,[
           'email' => 'required|email',
           'subject' => 'required',
           'message' => 'required',
        ]);

        $data = [
          'email' => $request->email,
          'subject' => $request->subject,
          'message' => $request->message,
        ];

        Mail::to($request->email)->send(new SubscriberEmail($data));

        return redirect()->back()->with([
            'msg' => __('Mail Send Success...'),
            'type' => 'success'
        ]);
    }
    public function delete($id){
        Newsletter::find($id)->delete();
        return redirect()->back()->with(['msg' => 'Subscriber Delete Success....','type' => 'danger']);
    }

    public function send_mail_all_index(){
        return view('backend.newsletter.send-main-to-all');
    }

    public function send_mail_all(Request $request){
        $this->validate($request,[
          'subject' => 'required',
          'message' => 'required',
      ]);
      $all_subscriber = Newsletter::all();

      foreach ($all_subscriber as $subscriber){
          $data = [
              'subject' => $request->subject,
              'message' => $request->message,
          ];
          Mail::to($subscriber->email)->send(new SubscriberEmail($data));
      }

      return redirect()->back()->with([
          'msg' => __('Mail Send Success..'),
          'type' => 'success'
      ]);
    }

      public function add_new_sub(Request $request){
          $this->validate($request,[
             'email' => 'required|email|unique:newsletters',
          ]);

          Newsletter::create([
              'email' => $request->email,
              'verified' => 0,
              'verify_token' => Str::random(32)
          ]);
          return redirect()->back()->with([
              'msg' => __('New Subscriber Added..'),
              'type' => 'success'
          ]);
      }

  public function verify_mail_send(Request $request){

    $subscriber_details = Newsletter::findOrFail($request->id);
    $token = $subscriber_details->verify_token ?? Str::random(32);
    if (empty($subscriber_details->verify_token)){
        $subscriber_details->verify_token = $token;
        $subscriber_details->save();
    }
    $message = __('verify your email to get all news from '). get_static_option('site_'.get_default_language().'_title') .
    '<div class="btn-wrap"> <a class="anchor-btn" href="' . route('subscriber.verify', ['token' => $token]) . '">'
     . __('verify email') . '</a></div>';
    $data = [
        'message' => $message,
        'subject' => __('verify your email')
    ];
      //send verify mail to newsletter subscriber
      Mail::to($subscriber_details->email)->send(new BasicMailTemplate($data,__('Verify your email')));

      return redirect()->back()->with([
          'msg' => __('verify mail send success'),
          'type' => 'success'
      ]);
  }

    public function bulk_action(Request $request){
        $all = Newsletter::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return (response()->json(['status' => 'ok']) &&
         redirect()->back()->with(['msg' => 'Subscriber Bulk Delete Success....','type' => 'danger']));
    }

}
