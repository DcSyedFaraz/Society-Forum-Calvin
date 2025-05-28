<?php

namespace App\Mail;

use App\Models\Architect;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArchitectRejected extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $architect;
    public $reason;

    public function __construct(Architect $architect, $reason)
    {
        $this->architect = $architect;
        $this->reason = $reason;
    }

     public function build()
    {
        return $this->subject('Your Architectural Request was Rejected')
                    ->view('mail.architect-rejected')
                    ->with([
                        'name' => $this->architect->name,
                        'reason' => $this->reason,
                    ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Architect Rejected',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
