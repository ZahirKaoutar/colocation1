<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    // /**
    //  * Create a new message instance.
    //  */
    // public $invitation;
    // public $colocation;
    // public $owner;

    // public function __construct($colocation, $owner, $invitation)
    // {
    //     $this->colocation = $colocation;
    //     $this->owner = $owner;
    //     $this->invitation = $invitation;
    // }

    // public function build()
    // {
    //     return $this->subject("Invitation à rejoindre la colocation {$this->colocation->name}")
    //                 ->view('emails.invitation');
    // }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Invitation Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }


    use Queueable, SerializesModels;

    public $invitation;
    public $colocation;
    public $owner;

    public function __construct($colocation, $owner, $invitation)
    {
        $this->colocation = $colocation;
        $this->owner = $owner;
        $this->invitation = $invitation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Invitation à rejoindre la colocation {$this->colocation->name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation', // le même nom de vue
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
