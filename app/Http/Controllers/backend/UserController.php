<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use App\Models\Profile;

class UserController extends Controller
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
       // $users = User::orderBy('id','desc')->get();

        // $total_usuarios = User::with('roles')->get()->filter(
        //     fn ($user) => $user->roles->where('name', 'usuario')->toArray()
        // )->count();

        //$roles = Role::all()->pluck('name');
        $usuarios = User::role('usuario')->get();

       // $users = $role->users;
        return view('backend.users.index',['users'=>$usuarios]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('user_id', $id)->first();

        if(empty($profile)){
            $profile = User::where('id',$id)->first();
        }
        return view('backend.users.edit',['profile'=>$profile]);
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

        $profile =  Profile::find($id);

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->middlename = $request->middlename;
        $profile->gender = $request->gender;
        $profile->birthday = $request->birthday;
        $profile->ssn = $request->ssn;
        $profile->address1 = $request->address1;
        $profile->address2 = $request->address2;
        $profile->city =$request->city;
        $profile->state =$request->state;
        $profile->zipcode =$request->zipcode;
        $profile->drivernumber =$request->drivernumber;
        $profile->driverstate =$request->driverstate;
        $profile->phone =$request->phone;
        $profile->email =$request->email;
        $profile->organization =$request->organization;
        $profile->emergencycontact =$request->emergencycontact;
        $profile->emergencyphone =$request->emergencyphone;
        $profile->relationship =$request->relationship;
        $profile->handguncaliber =$request->handguncaliber;
        $profile->handguntype =$request->handguntype;
        $profile->handgunrental =$request->handgunrental;
        $profile->shootingshotgun =$request->shootingshotgun;
        $profile->shotgungauce =$request->shotgungauce;
        $profile->shotgunrental =$request->shotgunrental;

        $profile->save();

        $user = User::where('id',$profile->user_id)->first();
        $user->name = $request->firstname;
        $user->email =  $request->email;
        $user->save();


        return redirect()->route('user.index',['id' => $profile->id ])
        ->with('info',' User data updated');
    }


    public function destroy(Request $request){
        User::find($request->id)->delete();

        return redirect()->route('adminuser.index')
        ->with('info','User deleted');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function myCourses($id){
         $cursos = UserCourse::where('user_id',$id)->get();

         dd($cursos);
     }

}
