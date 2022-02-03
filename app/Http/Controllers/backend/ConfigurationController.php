<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Requests\UpdateProfile;

class ConfigurationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }


    public function index()
    {
        $user = User::where('id',1)->first();
        return view('backend.config.index',['user'=>$user]);
    }


  /**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\User  $user
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{




   $data = $request->all();

   $user = User::find($id);



   $user->password =  Hash::make($data['newpassword']);
   $user->save();



   return redirect(route('configs.index', ['user' => $user]))
   ->with('info', 'Your profile has been updated successfully.');

}
}
