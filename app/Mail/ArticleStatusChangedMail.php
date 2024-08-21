<?php

namespace App\Mail;

use App\Models\ArticleModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ArticleModel $article, $status)
    {
        $this->article = $article;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Artikel Anda Telah Diperbarui')
        ->view('mail.article_status_changed');
    }
}