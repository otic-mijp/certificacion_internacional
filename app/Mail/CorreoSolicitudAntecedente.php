<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoSolicitudAntecedente extends Mailable
{
    use Queueable, SerializesModels;

    public string $num_tramite;
    public string $pais_nombre_oficial;
    public string $nombre_completo;

    /**
     * Create a new message instance.
     */
    public function __construct(string $num_tramite, string $pais_nombre_oficial, string $nombre_completo)
    {
        $this->num_tramite = $num_tramite;
        $this->nombre_completo = $nombre_completo;
        $this->pais_nombre_oficial = $pais_nombre_oficial;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud de Antecedente Internacional',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'emails.correo_solicitud',
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
