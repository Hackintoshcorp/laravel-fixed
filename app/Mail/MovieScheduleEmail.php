<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MovieScheduleEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $movies;

    public function __construct($movies)
    {
        $this->movies = $movies;
    }

    public function build()
    {
        return $this->view('emails.movie-list')
        ->with('movies', $this->movies);
    }
}
