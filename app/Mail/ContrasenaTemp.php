<?php

namespace App\Mail;

use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ContrasenaTemp extends Mailable
{
    use Queueable, SerializesModels;

        public $password;
    
        public $email;
        /**
         * Create a new message instance.
         */
    public function __construct($password,$email,$usuario)
    {
        $this->password = $password;
        $this->email = $email;
        $this->usuario = $usuario;

    }
    public function build()
    {
        return $this->view('emails.recuperacion')
                    ->with([
                        'password' => $this->password,
                        'email' => $this->email,
                        'usuario' => $this->usuario->nombre_usuario 

                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Correo de Contraseña Temporal',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.ContrasenaTemp',
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