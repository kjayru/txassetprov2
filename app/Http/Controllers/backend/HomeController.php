<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
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
        $user_id = Auth::id();
        $user = User::find($user_id);

        if($user->roles[0]->slug=='usuario'){
            return redirect()->route('front.calendar');
        }

        return view('backend.dashboard');
    }


}
