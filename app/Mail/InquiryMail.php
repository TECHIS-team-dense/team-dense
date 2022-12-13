<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $content;



    public function __construct(array $date)
    {
        foreach($date as $key => $value) {
            $this->{$key} = $value;
        }
    }


    public function build()
    {
        return $this->subject($this->name. 'さんからお知らせがあります。')
        ->text('emails.inquiry');
    }
}
