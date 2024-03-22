<?php

namespace App\Mail;

use App\Models\DemandePret;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocumentDemandeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public DemandePret $demande,
        public string $routeAccept,
        public string $routeReject
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $centralManagerOfApplicationEmail = User::query()
        ->whereHas('roles', function ($query) {
            $query->where('name', 'Gestionnaire-Central');
        })
        ->get()->first()->email;
        return new Envelope(
            to: $centralManagerOfApplicationEmail,
            replyTo: $this->demande->user->email,
            subject: 'Demande de Prêt pour un Document spécifque',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.demande-prets.demande',
            with: [
                'demande' => $this->demande,
                'urlaccept' => $this->routeAccept,
                'urlreject' => $this->routeReject,
            ],
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
