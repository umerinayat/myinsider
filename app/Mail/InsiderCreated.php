<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InsiderCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    public $insider;
    public $client;
    private $pdfFileNames;
    private $htmlViewName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$insider, $client, $pdfFileNames, $htmlViewName)
    {   
        $this->email = $email;
        $this->insider = $insider;
        $this->client = $client;
        $this->pdfFileNames = $pdfFileNames;
        $this->htmlViewName = $htmlViewName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject('Privacy policy for insider lists')
        // ->attach(storage_path($this->pdfFileName), [
        //     'mime' => 'application/pdf', // Optional
        //     'as' => 'privacy-policy.pdf', // Optional
        // ])
        // ->view($this->htmlViewName);

        $mail = $this->subject($this->email->subject) 
                ->from($address = env('MAIL_FROM_ADDRESS') , $name = $this->client->company->company_name)
                ->view($this->htmlViewName);

        foreach ($this->pdfFileNames as $pdfFile) 
        {
            $mail->attach(storage_path($pdfFile->name), $pdfFile->headers);
        }

        return $mail;

        
    }
}
