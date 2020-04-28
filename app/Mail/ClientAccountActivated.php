<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientAccountActivated extends Mailable
{
    use Queueable, SerializesModels;

    public $clientName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->clientName .' your account has been activated.')
            ->view('emails.client-activated');
    }
}
