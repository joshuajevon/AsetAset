<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $mail;

    /**
     * Create a new mail instance.
     */
    public function __construct(string $name, string $email, string $subject, string $mail)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->mail = $mail;
    }

    public function build()
    {
        return $this
        ->from($this->email, $this->name)
        ->subject($this->subject)->view('email')->with([
            'email' => $this->email,
            'mail' => $this->mail,
        ]);
    }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: $this->subject,
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'email',
    //     );
    // }

    // public function build()
    // {
    //     return $this->from($this->email);
    // }

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
