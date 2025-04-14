<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $customMessage;

     /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customMessage)
    {
        $this->customMessage = $customMessage;
    }

    public function build()
    {
        return $this->view('emails.notification')
                    ->with(['customMessage' => $this->customMessage]);
    }

}
