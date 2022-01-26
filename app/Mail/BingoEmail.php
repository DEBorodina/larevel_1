<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BingoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $balance;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@mail.ru','Daria')
            ->view('mails.bingo')
            ->with([
               'message2'=>'Message text',
            ])
            ->attach('https://www.meme-arsenal.com/memes/ada7e47465776032ac1071addc158c03.jpg');
    }
}
