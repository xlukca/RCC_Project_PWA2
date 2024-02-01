<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $result;
    public $selectedMonths;
    public $coffee_num;
    public $cost;
    /**
     * Create a new message instance.
     */
    public function __construct($result, $selectedMonths, $coffee_num, $cost)
    {
        $this->result = $result;
        $this->selectedMonths = $selectedMonths;
        $this->coffee_num = $coffee_num;
        $this->cost = $cost;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.notifications.email',
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
