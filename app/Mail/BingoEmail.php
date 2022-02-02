<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BingoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $name;
    public $withLine;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text,$name,$l)
    {
        $this->withLine = $l;
        $this->text = $text;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('test@mail.ru','Daria')
            ->view('mails.bingo');
    }
}
