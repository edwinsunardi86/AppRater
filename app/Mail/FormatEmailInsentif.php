<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
class FormatEmailInsentif extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $pdf;
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$pdf,$path)
    {
        $this->details = $details;
        $this->pdf = $pdf;
        $this->path = Storage::path($path);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('eslip@prohr.co.id','E-SLIP PROHR')->subject('E_SLIP '.date('M'))->view('emails.format_email',$this->details)->attachData($this->pdf->output(), "text.pdf");
        return $this->from('eslip@prohr.co.id','E-Incentive PROHR')->subject('E_INCENTIVES '.date('M'))->view('emails.format_email_insentif',$this->details)->attach($this->path, array('as'=>$this->pdf,'mime'=>'application/pdf'));
    }
}
