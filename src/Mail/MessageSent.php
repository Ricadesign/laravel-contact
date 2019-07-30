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
    public $phone;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $text, string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        $this->phone = $phone;
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
