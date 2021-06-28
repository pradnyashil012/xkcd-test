<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Comic extends Mailable
{
    use Queueable, SerializesModels;
    public $comic;
    public $sub;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comic, $sub)
    {
        $this->comic_data = $comic;
        $this->subject = $sub;
        
    }
    // $comical['safe_title']

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $comical = $this->comic_data;
       
        return $this->from(env('MAIL_USERNAME'), 'Pradnyashil')
                    ->subject($this->subject)
                    ->view('mail.comic_mail', compact('comical'))
                    ->attach('images/xkcd.png', [
                        'as' => 'xkcd.png',
                        'mime' => 'application/image',
                    ]);
    }
}
