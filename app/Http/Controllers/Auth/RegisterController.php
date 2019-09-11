<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;


class RegisterController extends Controller{
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
    protected $redirectTo = '/dashboard';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cac' => ['required', 'unique:users'],
            'phone' => ['required'],
        ]);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cac' => $data['cac'],
            'phone' => $data['phone'],
            'registration_id' => rand(10,100).rand(100, 1000).rand(10, 1000),
        ]);

        if(!$user) return;

        try {

            $note = 'Please be informed that your account was successfully registered, 
            You will need to verify all credentials submitted with the admin to enable your account';
            $data = array(
              'username' => $data['name'],
              'email' => $data['email'],
              'password' => $data['password'],
              'note' => $note,
              'phone' => $data['phone'],
             
            );
    
            Mail::send('emails.emailContractor', $data, function($message) use ($data) {
              $message->from('plateaustatebpp@gmail.com', "Plateau State BPP");
              $message->to($data['email']);
              $message->subject("PLBPP Account details");
           });
           return $user;

        }
        catch(Exception $e) {
            \Log::info('errrorr... '.$e);
        }
    }
}
