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
        $address = env('MAIL_FROM_ADDRESS', 'support@tap-security.com');
        $subject = 'Purchase made';
        $name = 'Support TAP';

        return $this->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->markdown('frontpage.mail.notifica');

    }
}
