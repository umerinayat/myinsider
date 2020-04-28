<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InsiderProjectEnd extends Mailable
{
    use Queueable, SerializesModels;

    public $insiderName;
    public $projectName;
    public $projectDescription;
    public $projectStartDate;
    public $projectEndDate;

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
        $this->projectEndDate = $projectDetail->projectEndDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->insiderName . ' your project name '. $this->projectName .' was ended.')
        ->view('emails.insiders.project-end');
    }
}
