<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessageMail extends Mailable {

    use Queueable, SerializesModels;

    public $notary;

    public function __construct($notary) {
        $this->notary = $notary;
    }

    public function envelope() {
        return new Envelope(subject: 'Mail from Natarius');
    }

    public function content() {
        return new Content(view: 'emails.sendMessageMail');
    }

    public function attachments() {
        return [];
    }
}
