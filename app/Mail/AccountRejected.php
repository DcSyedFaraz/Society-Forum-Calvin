<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountRejected extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    /**
     * The rejection reason.
     *
     * @var string|null
     */
    public $reason;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, ?string $reason = null)
    {
        // If the reason is not provided, use the user's decline reason or a default message
        $this->reason = $reason ?? $user->decline_reason ?? 'Incomplete Information';
        $this->user = $user;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Action Required: Your Account Request Was Not Approved',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.account-rejected',
            with: [
                'name' => $this->user->name,
                'reason' => $this->reason,
                'applicationUrl' => route('register')
            ],
        );
    }

}
