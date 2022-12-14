<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use App\Models\Course;

class CourseController extends Controller
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
        return view('backend.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $course = new Course();
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
        $course->tiempovalido = $request->access;

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $course->banner = $banner;
        }

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

        $course = Course::orderBy('id','desc')->first();

        return view('backend.courses.edit',['course'=>$course]);
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
        $course->tiempovalido = $request->access;

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $course->banner = $banner;
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
}
