<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailData = Subscriber::orderby('id','DESC')->first();
//        return $this->view('emails.hello',compact('emailData'));

        $this->subject($emailData->subject)
            ->view('emails.hello',compact('emailData'))
            ->cc($emailData['email'])
            ->from('razibhasan634@gmail.com');

        return $this;
    }
}
