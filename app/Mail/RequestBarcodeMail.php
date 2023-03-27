<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RequestBarcode;


class RequestBarcodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestBarcode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestBarcode)
    {
        $this->requestBarcode = $requestBarcode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('emails.request-barcode.index')->with([
            'requestBarcode' => $this->requestBarcode,
        ]);
    }

}
