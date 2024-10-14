<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Employment;
use App\Models\Military;
use App\Models\Disclaimer;

class ApplicantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Information::orderBy('id','desc')->get();
        return view('backend.applicants.index',['applicants'=>$applicants]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

     if(@$dias['wednesday']!=null || @$dias['wenesday']!=null){
        $semana[] = "wednesday";
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




        return view('backend.applicants.show',
        [
        'apli'=>$applicant,
        'week'=>$semana,
        'edu'=>$education,
        'references' => $references,
        'employments'=> $employments,
        'military' => $military,
        'disclaimer' => $disclaimer
         ]);
    }


}
