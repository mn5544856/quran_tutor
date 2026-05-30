<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FreeTrialBooked extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;

    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Free Trial Booking Confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.free-trial-booked',
            with: [
                'bookingData' => $this->bookingData,  // ← Ye line zaroori hai
            ]
        );
    }
}