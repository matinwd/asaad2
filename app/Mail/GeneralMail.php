<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $request;

    public $queue = 'default';

    /**
     * @param string $queue
     */
    public function setQueue(string $queue): void
    {
        $this->queue = $queue;
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from(env('MAIL_FROM_ADDRESS','info@ductcen.com'))
            ->html('mails.general')
        ->subject($this->request['title']);
        if(isset($this->request['image']))
            $mail->attach($this->request['image']);
        return $mail;
    }
}
