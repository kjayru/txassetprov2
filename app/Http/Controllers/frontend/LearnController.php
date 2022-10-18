<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class LearnController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
   
    public function index($id){
        $curso = Course::find($id);

        return view('frontpage.learn.index',['curso'=>$curso]);
    }
}
