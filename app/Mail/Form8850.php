<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Form;
use PDF;


class Form8850 extends Mailable
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


        $address = env('MAIL_FROM_ADDRESS', 'support@tap-security.com');
        $subject = 'Form 8850';
        $name = 'Support TAP';

        $id = $this->data["form_id"];

        $formdata = Form::find($id);
        $condicion =  unserialize($formdata->condicional);


        $pdf = PDF::loadView('frontpage.pdf.form8850', [
            'data'=>$formdata,
            'condicion' => $condicion
             ]);
        //$output =  $pdf->output('form8850.pdf');



         $maildata = $this->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->markdown('frontpage.mail.form8850')
                    ->with($this->data)
                    ->attachData(
                        $pdf->output(), 'form8850.pdf', [
                        'mime' => 'application/pdf',
                    ]
                );




        return $maildata;


    }
}
