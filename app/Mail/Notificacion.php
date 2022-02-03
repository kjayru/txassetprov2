<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'support@txassetpro.com';
        $subject = 'Purchase made';
        $name = 'Support TAP';

        return $this->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->markdown('frontpage.mail.notifica');

    }
}
