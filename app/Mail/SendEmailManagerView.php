<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailManagerView extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var $data
     */
    public $data;

    /**
     * Create a new message instance.
     * @param  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email-template.manager');
    }
}
