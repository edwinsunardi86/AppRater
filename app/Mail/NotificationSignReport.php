<?php

namespace App\Mail;

// use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class NotificationSignReport extends Mailable
{
    use Queueable, SerializesModels;
    // public string $from;
    public $emailTo;
    public $fullname;
    public $subject;
    public $details;
    public $pdf;
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailTo,$fullname,$subject,$details,$pdf,$path)
    {
        // $this->from = $from;
        // $this->replyTo = $replyTo;
        // $this->subject = $subject;
        $this->emailTo = $emailTo;
        $this->fullname = $fullname;
        $this->subject = $subject;
        $this->details = $details;
        $this->pdf = $pdf;
        $this->path = Storage::path($path);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('sos.report@sos.co.id','SOS Report'),
            replyTo:[new Address($this->emailTo, $this->fullname)],
            to:[new Address($this->emailTo)],
            subject: $this->subject
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
            view: 'emails.notification_sign_report',
            with: $this->details
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath($this->path)->as($this->pdf)->withMime('application/pdf')
        ];
    }
}
