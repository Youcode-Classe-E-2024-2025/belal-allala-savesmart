<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // Ajout de cette ligne

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Ajout de cette propriété

    /**
     * Create a new message instance.
     */
    public function __construct(User $user) // Modification du constructeur
    {
        $this->user = $user; // Assignation de la propriété $user
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to SaveSmart!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.welcome', // Utilisation d'un template Markdown
            with: [
                'name' => $this->user->name, // Passage du nom de l'utilisateur à la vue
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