<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Registro exitoso, active su cuenta';

    public $nombre, $correo;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Register Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.register',
            with: [
                'nombre' => $this->nombre,
                'correo' => $this->correo
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
