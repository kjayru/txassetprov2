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
        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;

        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
       
        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        
        if(isset($chapters)){
        $contenido = ChapterContent::where('chapter_id',$chapters[0]->id)->where('slug',$chapters[0]->chaptercontents[0]->slug)->first();
        }
        return view('frontpage.learn.index',['capitulo'=>$chapters[0],'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapters[0]->id,'slug'=>$chapters[0]->chaptercontents[0]->slug]);
    }

    public function chapter($id,$chapter){
        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        if(isset($chapters)){
        $capitulo = Chapter::where('slug',$chapter)->first();
        $contenido = ChapterContent::where('chapter_id',$capitulo->id)->where('slug',$capitulo->chaptercontents[0]->slug)->first();
        }
        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter]);
    }

    public function content($id,$chapter,$content){
       
        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        
        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        if(isset($chapters)){
        $capitulo = Chapter::where('slug',$chapter)->first();

        $contenido = ChapterContent::where('chapter_id',$capitulo->id)->where('slug',$content)->first();
       
        }
        
        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'slug'=>$content]);
    }
}
