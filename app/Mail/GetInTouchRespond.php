<?php

namespace App\Mail;

use App\Models\GetInTouch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GetInTouchRespond extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public GetInTouch $getInTouch,
    ){}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Get in Touch',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'mail.get-in-touch-mail',
            text: 'mail.get-in-touch-text',
            with: [
                'fullname' => $this->getInTouch->fullname,
                'reply' => $this->getInTouch->reply,
            ]
        );
    }
    
    public function attachments(): array
    {
        return [];
    }
}
