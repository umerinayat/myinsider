<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InsiderInformationPursuant extends Mailable
{
    use Queueable, SerializesModels;

    public $insider;
    public $client;
    private $pdfFileName;
    private $htmlViewName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($insider, $client, $pdfFileName, $htmlViewName)
    {
        $this->insider = $insider;
        $this->client = $client;
        $this->pdfFileName = $pdfFileName;
        $this->htmlViewName = $htmlViewName;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Insider Information Pursuant')
        ->attach(storage_path($this->pdfFileName), [
            'mime' => 'application/pdf', // Optional
            'as' => 'Insider-Information-Pursuant.pdf', // Optional
        ])
        ->view($this->htmlViewName);
    }
}
