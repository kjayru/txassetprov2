<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Chapter;
use App\Models\ChapterContent;
use App\Models\UserCourse;
use App\Models\UserCourseChapter;
use App\Models\UserCourseChapterContent;
use Illuminate\Support\Facades\Auth;


class LearnController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
   
    public function index($id){
        $curso = Course::find($id);
        $chapters = $curso->chapters;
        
        return view('frontpage.learn.index',['curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id]);
    }

    public function chapter($id,$chapter){
        $capVisitados=null;
        $contVisitados=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        $curso = Course::find($userCourse->id)->first();
        $chapters = $curso->chapters;
     
        $capitulo = Chapter::where('slug',$chapter)->first();

       

        return view('frontpage.learn.index',['curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter]);
    }

    public function content($id,$chapter,$content){
       
        $capVisitados=null;
        $contVisitados=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        $curso = Course::find($userCourse->id)->first();
        $chapters = $curso->chapters;
      
        $capitulo = Chapter::where('slug',$chapter)->first();

        $contenido = ChapterContent::where('chapter_id',$capitulo->id)->where('slug',$content)->first();
       

        
        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'slug'=>$content]);
    }
}
