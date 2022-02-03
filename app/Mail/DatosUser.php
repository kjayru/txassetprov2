<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DatosUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        ///


        ///
        $address = 'support@txassetpro.com';
        $subject = 'Register user';
        $name = 'Support TAP';

        return $this->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->markdown('frontpage.mail.datosuser')
                    ->with($this->data);

    }
}
