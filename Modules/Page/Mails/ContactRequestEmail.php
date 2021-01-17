<?php

namespace Modules\Page\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactRequestEmail extends Mailable {

    use Queueable,
        SerializesModels;


    protected $email;
    protected $description;
    
    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($email, $description) {
        $this->email = $email;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.template')->subject('Contact request from '.env('APP_NAME'))->with([
            'email' => $this->email,
            'description' => $this->description,
            'partial' => 'emails.page.contact-request'
        ]);
    }

}