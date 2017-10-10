<?php

namespace Ricadesign\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $text;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $text)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)->markdown('contact::email.sent');
    }
}
