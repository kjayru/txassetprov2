<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;
use App\Mail\DatosUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/training-calendar';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $messages =[
            'required' => 'Complete recaptcha validator',
        ];

        $validator = Validator::make($data, [
            'g-recaptcha-response' => 'required',
        ],$messages);



        if ($validator->fails()) {
            return redirect('/#section10')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = new User();

        $user->name = $data['firstname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $user->assignRole('usuario');

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->firstname = $data['firstname'];
        $profile->lastname = $data['lastname'];
        $profile->middlename = $data['middlename'];
        $profile->gender =$data['gender'];
        $profile->birthday =$data['birthday'];
        $profile->ssn =$data['ssn'];
        $profile->address1 =$data['address1'];
        $profile->address2 =$data['address2'];
        $profile->city =$data['city'];
        $profile->state =$data['state'];
        $profile->zipcode =$data['zipcode'];
        $profile->drivernumber =$data['drivernumber'];
        $profile->driverstate =$data['driverstate'];
        $profile->phone =$data['phone'];
        $profile->email =$data['email'];
        $profile->organization =$data['organization'];
        $profile->emergencycontact =$data['emergencycontact'];
        $profile->emergencyphone =$data['emergencyphone'];
        $profile->relationship =$data['relationship'];
        $profile->handguncaliber =$data['handguncaliber'];
        $profile->handguntype =$data['handguntype'];
        $profile->handgunrental =$data['handgunrental'];
        $profile->shootingshotgun =$data['shootingshotgun'];
        $profile->shotgungauce =$data['shotgungauce'];
        $profile->shotgunrental =$data['shotgunrental'];

        $profile->save();


        $correo = $data['email'];

        //mail user
        $dato = ['message' => "Register",'name'=> $data['firstname']];
        Mail::to($correo)->send(new Register($dato));

        //mail admin datos de usuario
        Mail::to(env('MAIL_CONTACT'))->send(new DatosUser($data));

        return $user;
    }
}
