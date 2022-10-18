<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        return view('frontpage.cursos.index');
    }

    public function todos(){
        $cursos = Course::all();
      
        return view('frontpage.cursos.cursos',['cursos'=>$cursos]);
    }

    public function curso($slug){
        $curso = Course::where('slug',$slug)->first();
       
        
        return view('frontpage.cursos.detalle',['curso'=>$curso]);
    }
}
