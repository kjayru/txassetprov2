<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Information;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Employment;
use App\Models\Military;
use App\Models\Disclaimer;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Form;
use App\Models\Archivo;
use App\Models\Employment as Employ;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Post;
use App\Models\Course;
use App\Models\Cart;
use App\Models\Profile;
use App\Models\UserSign;
use App\Models\User;
use App\Models\UserCourse;
use Session;
use Carbon\Carbon;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Employment as Empleo;
use App\Mail\Order;
use App\Mail\Form8850;
use App\Mail\Contact as Contacto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Mail\Bienvenido;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('orden','asc')->get();
        $posts = Post::orderBy('id','desc')->limit(4)->get();

        $articulos =[];

        foreach($posts as $col){
            $articulos[] = [
                'id' => $col->id,
                'titulo' => $col->titulo,
                'slug' => $col->slug,
                'card' => $col->card,
                'resumen' => Str::limit($col->resumen,100,'...'),
                'fecha' =>  strftime("%h %d, %Y", date (strtotime($col->created_at))),
            ];
        }
        $grupo = collect($articulos);

        return view('frontpage.home',['categories'=>$categories,'posts'=>$grupo]);
    }


    public function aboutus()
    {
        return view('frontpage.aboutus');
    }


    public function services()
    {
        return view('frontpage.service');
    }

    public function employment()
    {
        return view('frontpage.employment');
    }

    public function employementThank(Request $request)
    {
        $messages =[
            'required' => 'Complete recaptcha validator',
        ];
        /*$validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required',
        ],$messages);
        */
        $validated = $request->validate([
            'g-recaptcha-response' => 'required',
            //'firstname' => 'required',
        ],$messages);


        //dd($validator);
        //validadores

        $inf = new Information();

        $inf->lastname = $request->lastname;
        $inf->firstname = $request->firstname;
        $inf->mi = $request->mi;
        $inf->date = $request->date;
        $inf->address = $request->address;
        $inf->apartment = $request->apartment;
        $inf->city = $request->city;
        $inf->state = $request->state;
        $inf->zipcode = $request->zipcode;
        $inf->phone = $request->phone;
        $inf->email = $request->email;
        $inf->birthday = $request->birthday;
        $inf->socialnumber = $request->socialnumber;
        $inf->placebirth = $request->placebirth;
        $inf->appliedpay = $request->appliedpay;
        $inf->whichshift = $request->whichshift;

        $wichday = [
            "monday" => $request->monday,
            "tuesday" => $request->tuesday,
            "wenesday" => $request->wenesday,
            "thursday" => $request->thursday,
            "friday" => $request->friday,
            "saturday" => $request->saturday,
            "sunday" => $request->sunday
        ];
        $inf->whichday = serialize($wichday);

        $inf->citizen = $request->citizen;
        $inf->authorized = $request->authorized;
        $inf->worked = $request->worked;

        $inf->when = $request->when;

        $inf->convicted = $request->convicted;
        $inf->explain1 = $request->explain1;
        $inf->indictment = $request->indictment;
        $inf->explain2 = $request->explain2;
        $inf->save();

        $edu = new Education();

        $edu->graduatehigh = $request->graduatehigh;
        $edu->hightschool = $request->hightschool;
        $edu->highfrom = $request->highfrom;
        $edu->hightto = $request->hightto;
        $edu->graduatecollage = $request->graduatecollage;
        $edu->collaganame = $request->collaganame;
        $edu->collagefrom = $request->collagefrom;
        $edu->collageto = $request->collageto;
        $edu->activecard = $request->activecard;
        $edu->officer = $request->officer;
        $edu->firearm = $request->firearm;
        $edu->holster = $request->holster;
        $edu->others = $request->others;
        $edu->information_id = $inf->id;
        $edu->save();





        for($i = 0; $i<count($request->fullname);$i++){
            $ref = new Reference();
            $ref->fullname = $request->fullname[$i];
            $ref->relationship = $request->relationship[$i];
            $ref->companyref = $request->companyref[$i];
            $ref->phoneref = $request->phoneref[$i];
            $ref->addressreference = $request->addressreference[$i];
            $ref->information_id = $inf->id;
            $ref->save();
        }



       // dd($request->company);
        //dd($request['references']);
        if($request->companyprev !=null){
            $k=1;
            for($j = 0; $j<count($request->companyprev);$j++){
                if($request->companyprev[$j]!=null){
                $emp = new Employment();
                $refname = "references".$k;

                $emp->company = $request->companyprev[$j];
                $emp->phoneemp = $request->phoneemp[$j];
                $emp->addressempl = $request->addressempl[$j];
                $emp->supervisor = $request->supervisor[$j];
                $emp->jobtitle = $request->jobtitle[$j];
                $emp->starting = $request->starting[$j];
                $emp->ending = $request->ending[$j];
                $emp->from = $request->from[$j];
                $emp->to = $request->to[$j];
                $emp->reason = $request->reason[$j];
                $emp->references = $request[$refname];
                $emp->information_id = $inf->id;
                $emp->save();
                }
                $k++;

            }
        }

        $military = new Military();

        $military->branch = $request->branch;
        $military->from = $request->tomilitary;
        $military->to = $request->frommilitary;
        $military->rank = $request->rank;
        $military->type = $request->type;
        $military->explain = $request->explain;
        $military->information_id = $inf->id;
        $military->save();

        $discla = new Disclaimer();

        $discla->signature = $request->signature;

        $discla->datedisclamer = $request->datedisclamer;
        $discla->information_id = $inf->id;
        $discla->save();


        if ($request->hasFile('fileid')) {

            foreach($request->file('fileid') as $fil)
            {

                $file = Storage::putFile('applied', $fil);
                $archivo = new Archivo();
                $archivo->file = $file;
                $archivo->disclaimer_id = $discla->id;
                $archivo->save();
            }

        }


        $htmlcode ='<table cellspacing="0" cellpadding="0" border="0" width="100%" >
                        <tr>
                           <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                           <td>
                              <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                 <tr>
                                    <td height="55"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                 </tr>
                                 <tr>
                                    <td class="heading-editable"  style="font-size: 23px; color:#031059; text-transform: uppercase; text-align: center;font-family:family=Bebas+Neue; font-weight: 500; line-height: 1.7;"> <h1>FORM EMPLOYMENT </h1></td>
                                 </tr>
                                 <tr>
                                    <td height="25"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                 </tr>
                                 <tr>
                                    <td class="editable" style="font-size: 18px; line-height: 2; color:#031059; text-align: center ;font-family: ubuntu,Arial,Helvetica,sans-serif;">';


                                    $htmlcode.="Applicant information is attached to this email";

                                  /*  $htmlcode.="<h3>APPLICANT INFORMATION</h3><br>";

                                    $htmlcode.= 'LASTNAME: '.$request->lastname.'<BR>';
                                    $htmlcode.= 'FIRSTNAME: '.$request->firstname.'<BR>';
                                    $htmlcode.= 'M.I.: '.$request->mi.'<BR>';
                                    $htmlcode.= 'DATE: '.$request->date.'<BR>';
                                    $htmlcode.= 'ADDRESS: ' .$request->address.'<BR>';
                                    $htmlcode.= 'APARTAMENT: '.$request->apartment.'<BR>';
                                    $htmlcode.= 'CITY: '.$request->city.'<BR>';
                                    $htmlcode.= 'STATE: '.$request->state.'<BR>';
                                    $htmlcode.= 'ZIPCODE:' .$request->zipcode.'<BR>';
                                    $htmlcode.= 'PHONE: '.$request->phone.'<BR>';
                                    $htmlcode.= 'EMAIL: '.$request->email.'<BR>';
                                    $htmlcode.= 'DATE OF BIRTH: '.$request->birthday.'<BR>';
                                    $htmlcode.= 'SOCIAL SECURITY NO.: '.$request->socialnumber.'<BR>';
                                    $htmlcode.= 'PLACE OF BIRTH:'.$request->placebirth.'<BR>';
                                    $htmlcode.= 'POSITION APPLIED FOR AND DESIRED PAY: '.$request->appliedpay.'<BR>';
                                    $htmlcode.= 'WHICH SHIFT ARE YOU APPLYING FOR?: '.$request->whichshift.'<BR>';

                                    $htmlcode.= 'WHICH DAYS ARE YOU AVAILABLE? :';
                                    if($request->monday){
                                    $htmlcode.= "monday<BR>";
                                    }
                                     if($request->tuesday){

                                    $htmlcode.= "tuesday<BR>";

                                     }
                                     if($request->wenesday){
                                    $htmlcode.= "wenesday<BR>";
                                     }
                                     if($request->thursday){
                                    $htmlcode.= "thursday<BR>";
                                     }
                                     if($request->friday){
                                    $htmlcode.= "friday<BR>";
                                     }
                                     if($request->saturday){
                                    $htmlcode.= "saturday<BR>";
                                     }
                                     if($request->sunday){
                                    $htmlcode.= "sunday<BR>";
                                     }



                                    $htmlcode.= 'ARE YOU A CITIZEN OF THE UNITED STATES?: '.$request->citizen.'<BR>';
                                    $htmlcode.= 'IF NO, ARE YOU AUTHORIZED TO WORK IN THE U.S.?: '.$request->authorized.'<BR>';
                                    $htmlcode.= 'HAVE YOU EVER WORKED FOR THIS COMPANY?: '.$request->worked.'<BR>';

                                    $htmlcode.= 'IF YES, WHEN?: '.$request->when.'<BR>';

                                    $htmlcode.= 'HAVE YOU EVER BEEN CONVICTED OF A FELONY?: '.$request->convicted.'<BR>';
                                    $htmlcode.= 'IF YES, EXPLAIN: '.$request->explain1.'<BR>';
                                    $htmlcode.= 'ARE YOU CURRENTLY UNDER INDICTMENT FOR A CRIME?: '.$request->indictment.'<BR>';
                                    $htmlcode.= 'IF YES, EXPLAIN: '.$request->explain2.'<BR><BR>';

                                    $htmlcode.="<h3>EDUCATION AND TRAINING</h3><br>";

                                    $htmlcode.= 'DID YOU GRADUATE HIGH SCHOOL?: '.$request->graduatehigh.'<BR>';
                                    $htmlcode.= 'HIGH SCHOOL NAME: '.$request->hightschool.'<BR>';
                                    $htmlcode.= 'FROM: '.$request->highfrom.'<BR>';
                                    $htmlcode.= 'TO: '.$request->hightto.'<BR>';
                                    $htmlcode.= 'DID YOU GRADUATE COLLEGE?: '.$request->graduatecollage.'<BR>';
                                    $htmlcode.= 'COLLAGE NAME: '.$request->collaganame.'<BR>';
                                    $htmlcode.= 'FROM: '.$request->collagefrom.'<BR>';
                                    $htmlcode.= 'TO: '.$request->collageto.'<BR>';
                                    $htmlcode.= 'DO YOU HAVE AN ACTIVE SECURITY REGISTRATION CARD?: '.$request->activecard.'<BR>';
                                    $htmlcode.= 'IF YES, WHAT LEVEL SECURITY OFFICER ARE YOU?: '.$request->officer.'<BR>';
                                    $htmlcode.= 'IF LEVEL 3, DO YOU CURRENTLY HAVE A FIREARM?: '.$request->firearm.'<BR>';
                                    $htmlcode.= 'IF YES, WHAT LEVEL HOLSTER ARE YOU CURRENTLY USING?: '.$request->holster.'<BR>';
                                    $htmlcode.= 'ANY OTHER CERTIFICATIONS: '.$request->others.'<BR><BR>';




                                    $htmlcode.="<h3>REFERENCES</h3><br>";


                                    for($i = 0; $i<count($request->fullname);$i++){

                                        if($request->fullname[$i]!=""){
                                            $htmlcode.= 'FULL NAME: '.$request->fullname[$i]."<br>";
                                            $htmlcode.= 'RELATIONSHIP: '.$request->relationship[$i]."<br>";
                                            $htmlcode.= 'COMPANY: '.$request->companyref[$i]."<br>";
                                            $htmlcode.= 'PHONE: '.$request->phoneref[$i]."<br>";
                                            $htmlcode.= 'ADDRESS: '.$request->addressreference[$i]."<br>";
                                        }
                                    }
                                    if($request->companyprev !=null){
                                        $htmlcode.="<br><h3>PREVIOUS EMPLOYMENT</h3><br>";

                                        $k=1;
                                        for($j = 0; $j<count($request->companyprev);$j++){

                                            if($request->companyprev[$j]!=""){
                                            $htmlcode.= 'COMPANY: '.$request->companyprev[$j]."<br>";
                                            $htmlcode.= 'PHONE: '.$request->phoneemp[$j]."<br>";
                                            $htmlcode.= 'ADDRESS: '.$request->addressempl[$j]."<br>";
                                            $htmlcode.= 'SUPERVISOR: '.$request->supervisor[$j]."<br>";
                                            $htmlcode.= 'JOB TITLE: '.$request->jobtitle[$j]."<br>";
                                            $htmlcode.= 'STARTING SALARY: '.$request->starting[$j]."<br>";
                                            $htmlcode.= 'ENDING SALARY: '.$request->ending[$j]."<br>";
                                            $htmlcode.= 'FROM: '.$request->from[$j]."<br>";
                                            $htmlcode.= 'TO: '.$request->to[$j]."<br>";
                                            $htmlcode.= 'REASON FOR LEAVING: '.$request->reason[$j]."<br>";
                                            $htmlcode.= 'MAY WE CONTACT YOUR PREVIOUS SUPERVISOR FOR A REFERENCE?: '."references".$k."<br>";
                                            }
                                            $k++;
                                        }
                                    }

                                    $htmlcode.="<h3>MILITARY SERVICE</h3><br>";

                                    $htmlcode.= 'BRANCH: '.$request->branch."<br>";
                                    $htmlcode.= 'TO: '.$request->tomilitary."<br>";
                                    $htmlcode.= 'FROM: '.$request->frommilitary."<br>";
                                    $htmlcode.= 'RANK AT DISCHARGE: '.$request->rank."<br>";
                                    $htmlcode.= 'TYPE OF DISCHARGE: '.$request->type."<br>";
                                    $htmlcode.= 'IF OTHER THAN HONORABLE, EXPLAIN: '.$request->explain."<br><br>";


                                    $htmlcode.="<h3>DISCLAIMER AND SIGNATURE</h3><br>";


                                    $htmlcode.= 'NAME: '.$request->signature."<br>";

                                    if ($request->hasFile('fileid')) {
                                        $htmlcode.= 'ATTACH ID:<a href="'.env("APP_URL").'/storage/'.$file.'" target="_blank">Descargar file</a><br>';
                                    }

                                    $htmlcode.= 'DATE: '.$request->datedisclamer."<br>";*/

                                  $htmlcode.='</td>
                                 </tr>
                                 <tr>
                                    <td height="80"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                 </tr>
                              </table>
                           </td>
                           <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                        </tr>
                     </table>';

            $id =  $inf->id;
            $data = ["html"=>$htmlcode,"inf_id"=>$id];



            Mail::to(env('MAIL_CONTACT'))->send(new Empleo($data));




        return view('frontpage.gracias');
    }

    public function academy()
    {
        $events = Event::all();
        return view('frontpage.academy',['events'=>$events]);
    }

    public function academyDetail($slug)
    {

        $event = Event::where('slug',$slug)->first();

        return view('frontpage.detailacademy',['event'=>$event]);
    }


    public function training()
    {
        $events = Event::all();
        return view('frontpage.training',['events'=>$events]);
    }

    public function trainingDetail($id,$slug)
    {

        $event = Event::where('slug',$slug)->where('id',$id)->first();

        return view('frontpage.detail',['event'=>$event]);
    }




    public function contact()
    {
        return view('frontpage.contact');
    }

    public function contactGracias(Request $request){


        $messages =[
            'required' => 'Complete recaptcha validator',
        ];

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required',
        ],$messages);



        if ($validator->fails()) {
            return redirect('/#section10')
                        ->withErrors($validator)
                        ->withInput();
        }



            $ct = new Contact();


            $ct->name = $request->name;
            $ct->email = $request->email;
            $ct->phone = $request->phone;
            $ct->message = $request->message;
            $ct->origen = $request->origen;
            $ct->save();

            //htmlcode


           $htmlcode =' <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="wrapper-section-one" style=" font-family:family=Bebas+Neue;background: #ffffff;" bgcolor="#ffffff">
                  <tr>
                     <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" >
                           <tr>
                              <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                              <td>
                                 <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                       <td height="55"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                    <tr>
                                       <td class="heading-editable"  style="font-size: 23px; color:#031059; text-transform: uppercase; text-align: center;font-family:family=Bebas+Neue; font-weight: 500; line-height: 1.7;">';
                                    if($request->origen=="contact"){
                                        $htmlcode.='<h1> CONTACT FORM</h1>';
                                    }else{
                                        $htmlcode.='<h1> GET IN TOUCH FORM</h1>';
                                    }


                                       $htmlcode.=' </td>
                                    </tr>
                                    <tr>
                                       <td height="25"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                    <tr>
                                       <td class="editable" style="font-size: 12px; line-height: 2; color:#031059; text-align: LEFT;font-family: ubuntu,Arial,Helvetica,sans-serif;">';

                                         $htmlcode.= 'NAME:'.$request->name.'<BR>';
                                         if($request->origen=="contact"){
                                         $htmlcode.= 'PHONE:'.$request->phone.'<BR>';
                                         }
                                         $htmlcode.= 'EMAIL:'.$request->email.'<BR>';
                                         $htmlcode.= 'MESSAGE:'.$request->message.'<BR>';


                                     $htmlcode.='</td>
                                    </tr>
                                    <tr>
                                       <td height="80"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
              ';


         $data = ["html"=>$htmlcode];




         Mail::to(env('MAIL_CONTACT'))->send(new Contacto($data));


        return view('frontpage.graciasform');
    }

    public function quote()
    {
        return view('frontpage.quote');
    }


    public function generatepdf(){

        $id = 2;


        $applicant = Information::find($id);
        $education = Education::where('information_id',$id)->first();
        $references = Reference::where('information_id',$id)->get();
        $employments = Employment::where('information_id',$id)->get();

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
     if($dias['wenesday']!=null){
        $semana[] = "wenesday";
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
            'apli'=>$applicant,
            'week'=>$semana,
            'edu'=>$education,
            'references' => $references,
            'employments'=> $employments,
            'military' => $military,
            'disclaimer' => $disclaimer
             ]);
        $output =  $pdf->output('employment.pdf');

        //$output = $dompdf->output();

        // $mm = new Mail_mime("\n");

        // $mm->setTxtBody($body);
        // $mm->addAttachment($output,'application/pdf','output.pdf', false);

        // $body = $mm->get();
        // $headers = $mm->headers(array('From'=>$from,'Subject'=>$subject));

        // $mail =& Mail::factory('mail');
        // if($mail->send($to,$headers,$body)){
        //     echo "Your message has been sent.";
        // }

    }



    public function form8850(){

        return view("frontpage.form8850");
    }


    public function formThank(Request $request){

        $messages =[
            'required' => 'Complete recaptcha validator',
        ];

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required',
        ],$messages);


         $form = new Form();

         $form->yourname = $request->yourname;
         $form->socialnumber = $request->socialnumber;
         $form->address = $request->address;
         $form->citystate = $request->citystate;
         $form->country = $request->country;
         $form->telephone = $request->telephone;
         $form->birthday = $request->birthday;
         $form->condicional = serialize($request->condicional);
         $form->save();


        $htmlcode =' <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="wrapper-section-one" style=" font-family:family=Bebas+Neue;background: #ffffff;" bgcolor="#ffffff">
                  <tr>
                     <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" >
                           <tr>
                              <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                              <td>
                                 <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                       <td height="55"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                    <tr>
                                       <td class="heading-editable"  style="font-size: 23px; color:#031059; text-transform: uppercase; text-align: center;font-family:family=Bebas+Neue; font-weight: 500; line-height: 1.7;">';

                                        $htmlcode.='<h1>  FORM 8850</h1>';



                                       $htmlcode.=' </td>
                                    </tr>
                                    <tr>
                                       <td height="25"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                    <tr>
                                       <td class="editable" style="font-size: 12px; line-height: 2; color:#031059; text-align: LEFT;font-family: ubuntu,Arial,Helvetica,sans-serif;">';

                                       $htmlcode.=' <p>Attach file FORM 8850<p>';


                                     $htmlcode.='</td>
                                    </tr>
                                    <tr>
                                       <td height="80"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="24"><img src="images/blank.gif" width="1" height="1" alt=""/></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
              ';



        $id =  $form->id;
        $data = ["html"=>$htmlcode,"form_id"=>$id];



        Mail::to(env('MAIL_CONTACT'))->send(new Form8850($data));


         return view('frontpage.graciasform');


    }


    public function setpdfcss(){


     $id = 1;
        /*
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
            if($dias['wenesday']!=null){
                $semana[] = "wenesday";
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

                return view('frontpage.pdf.employment', [
                    'apli'=>$applicant,
                    'week'=>$semana,
                    'edu'=>$education,
                    'references' => $references,
                    'employments'=> $employments,
                    'military' => $military,
                    'disclaimer' => $disclaimer
                    ]);*/

        $formdata = Form::find($id);

        $condicion =  unserialize($formdata->condicional);


        return view('frontpage.pdf.form8850',  [
            'data'=>$formdata,
            'condicion' => $condicion
             ]);
    }


    public function industry(){
        $categories = Category::orderBy('id','desc')->get();
        return view('frontpage.industry.index',['categories'=>$categories]);
    }

    public function industryCard($slug){
        $categories = Category::orderBy('id','asc')->get();
        $category = Category::where('slug',$slug)->first();
        $industries = Industry::where('category_id',$category->id)->orderby('orden','asc')->get();
        return view('frontpage.industry.index',['categories'=>$categories,'category'=>$category,'industries'=>$industries]);
    }

    public function industryDetail($cat,$slug){
        $categories = Category::orderBy('id','asc')->get();

        $category = Category::where('slug',$cat)->first();
        $industry = Industry::where('slug',$slug)->first();


        return view('frontpage.industry.detail',['categories'=>$categories,'industry'=>$industry,'category'=>$category]);
    }


    public function blog(){
        $posts = Post::orderBy('id','desc')->get();

        $articulos =[];

        foreach($posts as $col){
            $articulos[] = [
                'id' => $col->id,
                'titulo' => $col->titulo,
                'slug' => $col->slug,
                'card' => $col->card,
                'resumen' => Str::limit($col->resumen,100,'...'),
                'fecha' =>  strftime("%h %d, %Y", date (strtotime($col->created_at))),
            ];
        }
        $grupo = collect($articulos);


        return view('frontpage.blog.index',['posts'=>$grupo]);
    }

    public function blogDetail($slug){
        $post = Post::where('slug',$slug)->first();

        $posts = Post::where('id','<>',$post->id)->orderBy('id','desc')->take(3)->get();

        $articulos =[];

        foreach($posts as $col){
            $articulos[] = [
                'id' => $col->id,
                'titulo' => $col->titulo,
                'slug' => $col->slug,
                'card' => $col->card,
                'resumen' => Str::limit($col->resumen,100,'...'),
                'fecha' =>  strftime("%h %d, %Y", date (strtotime($col->created_at))),
            ];
        }
        $grupo = collect($articulos);
        return view('frontpage.blog.detail',['post'=>$post,'articulos'=> $grupo]);
    }

    /**carrito */

    public function checksesion(){
       $estado = Auth::check();

       return response()->json(['estado'=>$estado]);
    }

    public function checksign(){

        $user_id = Auth::id();
       // $perfil = Profile::where('user_id',$user_id)->first();
        $mensaje = false;

        $check = UserSign::where('user_id',$user_id)->count();
        if($check > 0){
            $mensaje = true;
        }else{
            $mensaje = false;
        }
        return response()->json(['estado'=>$mensaje]);

    }

    public function carrito(){

        $carrito=null;
        if (Session::get('cart')) {
            $carrito = Session::get('cart');

        }
        $user_id = null;
        if(Auth::id()){
            $user_id = Auth::id();
        }

        return view('frontpage.cart.index',['cart'=>$carrito,'user_id'=>$user_id]);
    }

    public function process(Request $request){

        $curso = Course::find($request->id);

        $oldcart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldcart);

        if(isset($oldcart->items)){
            if(count($oldcart->items)>0){
                return response()->json(['rpta'=>'error']);
            }
        }
        $cart->add($curso,$curso->precio,1,$curso->id);

        $request->session()->put('cart', $cart);
        return response()->json(['rpta'=>'ok']);
    }

    public function removecart($id)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return response()->json(['rpta' => 'ok']);
    }

    public function loginPop(Request $request){

        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(['rtpa'=>'ok']);
            //return redirect()->intended();
        }

        /*return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');*/
        return response()->json(['rpta'=>'error','mensaje'=>'Wrong email or password. Please try again.']);
    }

    public function registerUser(Request $request){
        $credentials = $request->validate([
            'name'=>['required'],
            'email' => ['required', 'email','unique:users'],
            'password' =>[ 'required',Password::default()],

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole('usuario');

        Auth::login($user);

        $cursos = Course::orderBy('id','desc')->take(3)->get();
        $data = [
            'nombre'=>$user->name,
            'cursos'=>$cursos,
        ];



        Mail::to($user->email)->send(new Bienvenido($data));
        //mail bienvenido


        return response()->json(['rpta'=>'ok','mensaje'=>' Account created successfully']);
    }


    public function estadoCarrito(){
        $mensaje = false;
        if (Session::get('cart')) {
            $mensaje=true;
        }

        return response()->json($mensaje);
    }

    public function verifyMycourse(Request $request){
        $mensaje = null;
        $verifica=false;

        //si aprobe el curso
        if(UserCourse::where('user_id',$request->user_id)->where('course_id',$request->course_id)->where('aprobado','1')->count()>0){
            $verifica = true;
            $mensaje = "You already have the course approved";
        }
        //si tengo activo el curso
        if(UserCourse::where('user_id',$request->user_id)->where('course_id',$request->course_id)->where('aprobado','0')->where('finalizado','0')->count()>0){
            $verifica = true;
            $mensaje = "You still have the active course, go to your profile and finish";
        }

        //



        return response()->json(["rpta"=>$verifica,"mensaje"=>$mensaje]);
    }


    public function test()
    {
        $course = Course::where('id',1)->get();


        return view('frontpage.cart.success',['ids'=>$course]);
    }

    public function enroll($cadena){

        $user_id = Crypt::decryptString($cadena);



        $user = UserSign::where('user_id',$user_id)->first();
        return view('frontpage.usuario.sign',['user'=>$user]);
    }

}
