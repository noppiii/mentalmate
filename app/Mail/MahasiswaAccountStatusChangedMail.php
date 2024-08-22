<?php

namespace App\Mail;

use App\Models\MahasiswaModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MahasiswaAccountStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mahasiswa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MahasiswaModel $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Artikel Anda Telah Diperbarui')
            ->view('mail.account_mahasiswa_status_changed');
    }
}
