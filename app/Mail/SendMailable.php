<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('john@webslesson.info')->subject('New Customer Equiry')->view('dynamic_email_template');
    }
}
