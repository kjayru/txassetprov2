<?php

namespace App\Mail;

use App\Models\Information;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Employment as Employ;
use App\Models\Military;
use App\Models\Archivo;
use App\Models\Disclaimer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;

class Employment extends Mailable
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


        $address = 'support@txassetpro.com';
        $subject = 'Employment user register';
        $name = 'Support TAP';


    $id = $this->data["inf_id"];

        $applicant = Information::find($id);
        $education = Education::where('information_id',$id)->first();
        $references = Reference::where('information_id',$id)->get();
        $employments = Employ::where('information_id',$id)->get();

        $military = Military::where('information_id',$id)->first();

        $disclaimer = Disclaimer::where('information_id',$id)->first();

       $dias =  unserialize($applicant->whichday);
       $semana = null;
       if($dias['monday']!=null){
          $semana[] = "Monday";
       }
       if($dias['tuesday']!=null){
        $semana[] = "Tuesday";
     }
     if($dias['wednesday']!=null){
        $semana[] = "Wednesday";
     }
     if($dias['thursday']!=null){
        $semana[] = "Thursday";
     }
     if($dias['friday']!=null){
        $semana[] = "Friday";
     }
     if($dias['saturday']!=null){
        $semana[] = "Saturday";
     }
     if($dias['sunday']!=null){
        $semana[] = "Sunday";
     }



        $pdf = PDF::loadView('frontpage.pdf.employment', [
            'apli'=>@$applicant,
            'week'=>@$semana,
            'edu'=>@$education,
            'references' => @$references,
            'employments'=> @$employments,
            'military' => @$military,
            'disclaimer' => @$disclaimer
             ]);
        //$output =  $pdf->output('employment.pdf');

        //PDF::loadView('my-actual-view',compact('data'))->output()

         $maildata = $this->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->markdown('frontpage.mail.employment')
                    ->with($this->data)
                    ->attachData(
                        $pdf->output(), 'employment.pdf', [
                        'mime' => 'application/pdf',
                    ]
                );

        $archivos = Archivo::where('disclaimer_id',$disclaimer->id)->get();

        foreach($archivos as $filePath){
            $location = "https://www.txassetpro.com/storage/".$filePath->file;
            $maildata->attach($location);
        }


        return $maildata;


    }
}
