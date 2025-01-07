<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\Profile;
use App\Models\Course;
use Carbon\Carbon;
use App\Models\UserSign;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
        $profile->social_number = $request->socialnumber;
        $profile->save();

        $user = User::where('id',$profile->user_id)->first();
        $user->name = $request->firstname;
        $user->email =  $request->email;
        $user->save();


        return redirect()->route('adminuser.index',['id' => $profile->id ])
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


         return view('backend.users.my-course',['cursos'=>$cursos,'user_id'=>$id]);
     }


     public function certificado($id,$user_course_id,$user_id){
        $curso = Course::find($id);

        $user = User::find($user_id);
        $user_course = UserCourse::find($user_course_id);
        $certificado = $curso->certification->image;



    // $pdf = PDF::loadView('pdf.index', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course ])->setOptions([
    //     'isHtml5ParserEnabled' => true,
    //     'isRemoteEnabled' => true,
    //     'dpi' =>137,

        if($curso->certification_id==1){
            $pdf = PDF::loadView('pdf.certificado1', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==2){
            $pdf = PDF::loadView('pdf.certificado2', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==3){
            $pdf = PDF::loadView('pdf.certificado3', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==4){
            $pdf = PDF::loadView('pdf.certificado4', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }
        $pdf->setPaper('a4')->render();

        return $pdf->stream();

   // return $pdf->setPaper('a4', 'landscape')->dpi()stream('certificate'.uniqid().'.pdf');
    //$output =  $pdf->output('employment.pdf');

       // return view('pdf.index',['curso'=>$curso,'user'=>$user]);
    }

    public function enroll($id){

        $user = UserSign::where('user_id',$id)->first();

        return view('backend.users.sign',['user'=>$user]);
    }

}
