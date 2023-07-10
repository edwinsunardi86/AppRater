<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
class FormatEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('eslip@prohr.co.id','E-SLIP PROHR')->subject('E_SLIP '.date('M'))->view('emails.format_email',$this->details)->attachData($this->pdf->output(), "text.pdf");
        return $this->from('sos.report@sos.co.id','App Satisfaction')->subject('Input Satisfaction '.$this->details['location_name'].' - '.$this->details['rater'])->view('emails.format_email',$this->details);
    }
}
