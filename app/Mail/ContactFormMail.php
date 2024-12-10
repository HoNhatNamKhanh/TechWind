<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $comments;

    public function __construct($name, $email, $subject, $comments)
    {
            $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->comments = $comments;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.contact-form')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'comments' => $this->comments,
            ]);
    }
}
