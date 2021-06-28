<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data_mail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_data = $this->data_mail;
        return $this->from(env('MAIL_USERNAME'), 'Pradnyashil')
                    ->subject('OTP for verification')
                    ->view('mail.verification_mail', compact('mail_data'));
    }
}
