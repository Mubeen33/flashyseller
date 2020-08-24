<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordRecoveryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $siteURL;
    public $firstName;
    public $lastName;
    public $token;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($siteURL, $firstName, $lastName, $token, $email)
    {
        $this->siteURL = $siteURL;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSendNow = $this->subject('Flashybuy - Password Reset Link')->view('email-templates.password-reset')
        ->with([
            'siteURL' => $this->siteURL,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'token' => $this->token,
            'email' => $this->email
        ]);
        return $emailSendNow;
    }
}
