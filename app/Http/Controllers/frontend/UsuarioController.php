<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }

    public function index(){
        return view('frontpage.usuario.index');
    }
     public function misCursos(){


        $user_id = Auth::id();
        $user = User::find($user_id);

        $cursos = UserCourse::where('user_id',$user_id)->get();
       
        return view('frontpage.usuario.miscursos',['cursos'=>$cursos]);
     }
}
