<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamCourse;
use App\Models\Certification;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.bñb
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id','desc')->get();


        return view('backend.courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificados = Certification::all();
        $certication_id = 0;

        return view('backend.courses.create',['certificados'=>$certificados,'certification_id'=>$certication_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $validated = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'banner' => 'required',
            'video' => 'required',

        ]);

        $course = new Course();
        $course->titulo = $request->title;
        $course->slug = Str::slug($request->title, '-');

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $course->banner = $banner;
        }
        if($request->hasFile('video')) {
            $video = $request->file('video')->store('video');
            $course->video = $video;
        }


        $course->resumen = $request->excerpt;
        $course->contenido = $request->description;
        $course->precio = $request->price;

        $course->disponible = $request->available;
        $course->capitulos = $request->chapters;
        $course->audio = $request->audio;
        $course->nivel = $request->nivel;
        $course->language = $request->language;
        $course->responsable = $request->responsable;
        $course->tiempovalido = $request->access;

        $course->certification_id = $request->certification_id;

        $course->save();

        return redirect()->route('courses.index',['id' => $course->id ])
        ->with('info','Course create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $course = Course::where('id',$id)->first();

       $certication_id = $course->certification->id;

       $certificados = Certification::all();

        return view('backend.courses.edit',['course'=>$course,'certificados'=>$certificados,'certification_id'=>$certication_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $course =  Course::find($id);
        $course->titulo = $request->title;
        $course->slug = Str::slug($request->title, '-');
        $course->precio = $request->price;
        $course->resumen = $request->excerpt;
        $course->contenido = $request->description;
        $course->disponible = $request->available;
        $course->capitulos = $request->chapters;
        $course->audio = $request->audio;
        $course->nivel = $request->nivel;
        $course->language = $request->language;
        $course->responsable = $request->responsable;
        $course->tiempovalido = $request->access;
        $course->certification_id = $request->certification_id;

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $course->banner = $banner;
        }
        if($request->hasFile('video')) {
            $video = $request->file('video')->store('video');
            $course->video = $video;
        }

        $course->save();


        return redirect()->route('courses.index',['id' => $course->id ])
        ->with('info','Course updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Course::find($request->id)->delete();

        return redirect()->route('courses.index')
        ->with('info','Course deleted');
    }

    public function getExam(){
        $exams = Exam::orderBy('id','desc')->get();

        return response()->json($exams);
    }

    public function setCourseExam(Request $request){

        ExamCourse::where('course_id',$request->course_id)->delete();
        $ec =  ExamCourse::create([
            'course_id'=>$request->course_id,
            'exam_id'=>$request->exam
        ]);
        // $ec->course_id = ;
        // $ec->exam_id = $request->exam;
        // $ec->save();

        return redirect()->route('courses.index')
        ->with('info','Exam Asign');
    }
}
