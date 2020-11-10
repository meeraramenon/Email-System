<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
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
        $this->data = $data;
        //$replyto_email = "jervis@exmarketplace.com";
        //$cc_email = "shah@exmarketplace.com";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data['campaign'])
        ->view('dynamic_email_template_send')
        ->cc("shah@exmarketplace.com", $name="Shah Faisal")
        ->replyTo("jervis@exmarketplace.com", $name="Jervis Saldanha")
        ->with('data', $this->data);
    }
}
