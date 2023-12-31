<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $attachment;


    public function __construct($data, $attachment_list)
    {
        $this->data = $data;
        $this->attachment = $attachment_list;
    }

    public function build()
    {

        $mail =  $this->from(get_static_option('site_global_email'),get_static_option('site_'.get_default_language().'_title'))
            ->subject('This Quote Message Send From '. get_static_option('site_'.get_default_language().'_title') )
            ->view('mail.request-quote');
        if (!empty($this->attachment)){
            foreach ($this->attachment as $field_name => $attached_file){
                if (file_exists($attached_file)){
                    $mail->attach($attached_file);
                }
            }
        }

        return $mail;
    }
}
