<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestInstructionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestMail)
    {
        $this->requestMail = $requestMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request-instruction.index')->with([
            'requestMail' => $this->requestMail,
        ]);
    }
}
