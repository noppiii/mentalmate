<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReminderPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $psikolog;
    public $harga_konsultasi;
    public $tanggal;
    public $metode_pembayaran;
    public $snapToken;

    public function __construct($nama, $psikolog, $harga_konsultasi, $tanggal, $metode_pembayaran, $snapToken)
    {
        $this->nama = $nama;
        $this->psikolog = $psikolog;
        $this->harga_konsultasi = $harga_konsultasi;
        $this->tanggal = $tanggal;
        $this->metode_pembayaran = $metode_pembayaran;
        $this->snapToken = $snapToken;
    }

    public function build()
    {
        return $this->subject('Pengingat Pembayaran Konsultasi Anda')
            ->view('mail.payment-reminder');
    }
}
