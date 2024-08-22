<?php

namespace App\Mail;

use App\Models\PsikologModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PsikologAccountStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $psikolog;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PsikologModel $psikolog)
    {
        $this->psikolg = $psikolog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Artikel Anda Telah Diperbarui')
            ->view('mail.account_psikolog_status_changed');
    }
}
