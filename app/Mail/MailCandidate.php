<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;

class MailCandidate extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $data;
    public $attachment;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $body, $data, UploadedFile $attachment = null)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->data = $data;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $mail = $this->subject($this->subject)
            ->markdown($this->data['view'])
            ->with([
                'subject' => $this->subject,
                'body' => $this->body
            ]);

        if ($this->attachment) {
            $mail->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType(),
            ]);
        }
        return $mail;
    }

}
