<?php

namespace App\Mail;

use App\Models\DemandePret;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcceptDemandeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $destination;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public DemandePret $demandePret
    ) {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->demandePret->user->email,
            subject: 'Demande de prêt de document acceptée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.demande-prets.acceptDemande',
            with: ['demandePret' => $this->demandePret]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
