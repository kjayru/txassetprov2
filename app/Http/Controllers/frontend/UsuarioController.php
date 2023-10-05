<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\User;
use App\Models\Profile;
use App\Models\UserCourseChapter;
use App\Models\UserCourseChapterContent;
use App\Models\ChapterQuiz;
use App\Models\ChapterQuizOption;
use App\Models\UserChapterQuizOption;
use App\Models\UserChapterQuiz;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }

    public function index(){
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('frontpage.usuario.index',['user'=>$user]);
    }


     public function misCursos(){


        $user_id = Auth::id();
        $user = User::find($user_id);

        $cursos = UserCourse::where('user_id',$user_id)->get();

        //verificar vencimiento
        $grupo = null;

        foreach($cursos as $curso){
            if($curso->aprobado==1){
                $grupo[] = $curso;
            }else if($curso->intentos< 3  && $curso->reiniciado==0){
                if($curso->aprobado==0){
                $grupo[] = $curso;
                }
            }
        }

        $courses = collect($grupo);

       ///dd($courses);
       //verificamos caducidad
       $ahora = carbon::now();


       foreach($cursos as $curso){
            $dias_disponibles = UserCourse::dayleft($curso->id);

            if($dias_disponibles<=0){
                print_r($dias_disponibles);
                UserCourse::procesoCaducado($curso->id);
            }
       }



        return view('frontpage.usuario.miscursos',['cursos'=>$cursos,'user'=>$user]);
     }

     public function setChapter(Request $request){

        //   "usercourseid" => "18"
        //   "usercoursechapterid" => "2"
        //   "usercoursechaptercontentid" => "2"

        $uchapter=UserCourseChapter::where('user_course_id',$request->usercourseid)->where('chapter_id',$request->usercoursechapterid)->count();
        if($uchapter==0){
            $ucc = new UserCourseChapter();
            $ucc->user_course_id =  $request->usercourseid;
            $ucc->chapter_id =    $request->usercoursechapterid;
            $ucc->save();


                $uccc = new UserCourseChapterContent();
                $uccc->user_course_chapter_id= $ucc->id;
                $uccc->content_id =$request->usercoursechaptercontentid;
                $uccc->save();



        }else{
            $uchap=UserCourseChapter::where('user_course_id',$request->usercourseid)->where('chapter_id',$request->usercoursechapterid)->first();

            $ucontent=UserCourseChapterContent::where('user_course_chapter_id',$uchap->id)->where('content_id',$request->usercoursechaptercontentid)->count();

            if($ucontent==0){

                $uccc = new UserCourseChapterContent();
                $uccc->user_course_chapter_id= $uchap->id;
                $uccc->content_id =$request->usercoursechaptercontentid;
                $uccc->save();

            }
        }



        return response()->json(['rpta'=>'ok']);
     }



     public function setChapterContent(Request $request){
        $uccc = new UserCourseChapterContent();
        $uccc->user_course_chapter_id = $request->user_course_chapter_id;
        $uccc->content_id = $request->content_id;
        $uccc->save();
        return response()->json(['rpta'=>'ok']);
     }


     public function editUser(){
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('frontpage.usuario.edit',['user'=>$user]);

     }

     public function saveProfile(Request $request){


        $user_id = Auth::id();
        $user = User::find($user_id);

        if(Profile::where('user_id',$user_id)->count()>0){
         $profile = Profile::where('user_id',$user_id)->first();
         $profile->user = $request->user;
         $profile->firstname = $request->name;
         $profile->middlename = $request->middle;
         $profile->lastname = $request->lastname;

         $profile->save();

        }else{
         $profile = new Profile();
         $profile->user_id = $user_id;
         $profile->user = $request->user;
         $profile->firstname = $request->name;
         $profile->middlename = $request->middle;
         $profile->lastname = $request->lastname;

         $profile->save();

        }

      $user->usuario = $request->user;

      $user->name = $request->name;
      $user->middle = $request->middle;
      $user->lastname = $request->lastname;
      $user->save();

      return redirect()->route('user.index')
      ->with('info','Usuario actualizado');
     }


     public function outcome($resultado,$id){

        $user_id = Auth::id();
      $user_course = UserCourse::find($id);

      $capitulos = count($user_course->UserCourseChapters);
      $dias = UserCourse::dayleft($id);

      $curso = $user_course->course;


        return view('frontpage.usuario.outcome',[
            'curso'=>$curso,
            'resultado'=>$resultado,
            'user_course'=>$user_course,
            'capitulos'=>$capitulos,
            'dias'=>$dias,
            'user_id'=>$user_id
        ]);
     }

     public function userProfile(){

      $user_id = Auth::id();
      $user = User::find($user_id);

      if(Profile::where('user_id',$user_id)->count()==0){
         return response()->json(false);
      }

      return response()->json(true);

     }

     public function firstProfile(){

      $user_id = Auth::id();
      $user = User::find($user_id);

      return view('frontpage.usuario.profile',['user'=>$user]);
     }

     public function userSaveProfile(Request $request){


       $user_id = Auth::id();
       $user = User::find($user_id);
       $user->name = $request->firstname;
       $user->save();

       $profile = new Profile();
       $profile->user_id = $user->id;
       $profile->firstname = $request->firstname;
       $profile->lastname = $request->lastname;
       $profile->middlename = $request->middlename;
       $profile->gender =$request->gender;
       $profile->birthday =$request->birthday;
       $profile->ssn =$request->ssn;
       $profile->address1 =$request->address1;
       $profile->address2 =$request->address2;
       $profile->city =$request->city;
       $profile->state =$request->state;
       $profile->zipcode =$request->zipcode;
       $profile->drivernumber =$request->drivernumber;
       $profile->driverstate =$request->driverstate;
       $profile->phone =$request->phone;
       $profile->email =$request->email;
       $profile->organization =$request->organization;
       $profile->emergencycontact =$request->emergencycontact;
       $profile->emergencyphone =$request->emergencyphone;
       $profile->relationship =$request->relationship;
       $profile->handguncaliber =$request->handguncaliber;
       $profile->handguntype =$request->handguntype;
       $profile->handgunrental =$request->handgunrental;
       $profile->shootingshotgun =$request->shootingshotgun;
       $profile->shotgungauce =$request->shotgungauce;
       $profile->shotgunrental =$request->shotgunrental;

       $profile->save();


       //mail user
       $dato = ['message' => "Register",'name'=> $request->firstname];
       //Mail::to($correo)->send(new Register($dato));

       //mail admin datos de usuario
       //Mail::to(env('MAIL_CONTACT'))->send(new DatosUser($data));

       return redirect()->route('user.index')->with('info','User profile Updated, thanks');

     }


     public function courseAgain(Request $request){
         $registro = UserCourse::where('user_id',$request->user_id)->where('course_id',$request->course_id)->first();

         $user_course_id = $registro->id;
         $registro->intentos = $registro->intentos + 1;
         $registro->save();

         //eliminamos registros

         $ucc = UserCourseChapter::where('user_course_id',$user_course_id)->get();

         foreach($ucc as $col){
            UserCourseChapterContent::where('user_course_chapter_id',$col->id)->delete();
         }

         UserCourseChapter::where('user_course_id',$user_course_id)->delete();

         $capitulos = Course::where('id',$registro->course_id)->get();

         foreach($capitulos as $cap){
            UserChapterQuiz::where('user_id',$request->user_id)->where('chapter_id',$cap->id)->delete();
         }


     }
}

