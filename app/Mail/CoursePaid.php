<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursePaid extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $selectedCourses;
    public $part_name;
    public $reference_id;
    public $amount;
    public $program;
    public $charges;
    public $discountedAmount;

    public function __construct($user, $selectedCourses, $part_name, $reference_id, $amount, $program, $charges, $discountedAmount)
    {
        $this->user = $user;
        $this->selectedCourses = $selectedCourses;
        $this->part_name = $part_name;
        $this->reference_id = $reference_id;
        $this->amount = $amount;
        $this->program = $program;
        $this->charges = $charges;
        $this->discountedAmount=$discountedAmount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Course Purchase',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.course_paid',
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
