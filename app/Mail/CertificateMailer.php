<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMailer extends Mailable
{
    use Queueable, SerializesModels;
    
    public $path;
    // public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
        // $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.certificate')->attach(public_path() . '/' .$this->path, [
                    'as' => 'certificate.pdf',
                    'mime' => 'application/pdf',
                ]);
    }
}
