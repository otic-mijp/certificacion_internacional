<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecuperarPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $claveTemporal;
    public $usuario;

    /**
     * Create a new message instance.
     */
    public function __construct($clave, $usuario)
    {
        $this->claveTemporal = $clave;
        $this->usuario = $usuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Clave Temporal de Acceso - Certificacion Internacional MPPRIJP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'site.mails.recuperar_clave',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
