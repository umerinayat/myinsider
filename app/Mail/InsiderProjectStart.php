<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InsiderProjectStart extends Mailable
{
    use Queueable, SerializesModels;

    public $insiderName;
    public $projectName;
    public $projectDescription;
    public $projectStartDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($projectDetail)
    {
        $this->insiderName = $projectDetail->insider->title .' '. $projectDetail->insider->user->first_name .' '. $projectDetail->insider->user->last_name;
        $this->projectName = $projectDetail->projectName;
        $this->projectDescription =  $projectDetail->projectDescription;
        $this->projectStartDate = $projectDetail->projectStartDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->insiderName . ' you have been added to a project name '. $this->projectName)
            ->view('emails.insiders.project-start');
    }
}
