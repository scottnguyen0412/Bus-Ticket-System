<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailNotifyContract extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $contact;
    public $admin_receiver;
    public function __construct($contact, $admin_receiver)
    {
        $this->contact = $contact;
        $this->admin_receiver = $admin_receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(ENV('MAIL_USERNAME'))
            ->view('frontend.emails.mailContact')
            ->subject('Mail sent from Bus Booking System');
    }
}
