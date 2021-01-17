<?php

namespace Modules\Core\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SystemErrorAdminEmail extends Mailable {

    use Queueable,
        SerializesModels;


    protected $errorName;

    public function __construct($errorName) {
        $this->errorName = $errorName;
    }

    public function build() {     
        return $this->view('emails.template')->subject('System ERROR alert')->with([
            'errorName' => $this->errorName,
            'partial' => 'core::emails.system-error-alert'
        ]);
    }

}