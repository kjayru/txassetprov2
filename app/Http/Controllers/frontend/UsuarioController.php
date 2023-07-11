<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\User;
use App\Models\UserCourseChapter;
use App\Models\UserCourseChapterContent;
use App\Models\ChapterQuiz;
use App\Models\ChapterQuizOption;
use App\Models\UserChapterQuizOption;
use App\Models\UserChapterQuiz;

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
        $uccc->user_course_chapter_id= $request->user_course_chapter_id;
        $uccc->$content_id =$request->content_id;
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


      $user->usuario = $request->user;
      $user->email = $request->email;
      $user->name = $request->name;
      $user->middle = $request->middle;
      $user->lastname = $request->lastname;
      $user->save();

      return redirect()->route('user.index')
      ->with('info','Usuario actualizado'); 
     }
    

     public function outcome($resultado){
        return view('frontpage.usuario.outcome',['resultado'=>$resultado]);
     }
}

