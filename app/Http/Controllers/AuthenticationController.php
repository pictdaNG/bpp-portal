<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Authentication\AuthenticationContract;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticationController extends Controller
{
    protected $repo;

    public function __construct(AuthenticationContract $authenticationContract) {
        $this->repo = $authenticationContract;
    }
    
    public function login(Request $request) {

        // dd($request->all());

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $notification = array(
                'message' => 'Successfully logged in',
                'alert-type' => 'success'
            );
            return redirect()->intended('dashboard')->with($notification);
        } else {
            // Authentication failed...
            $notification = array(
                'message' => 'Field to log in, please check your credentials and try again',
                'alert-type' => 'error'
            );
            Session::flash('error', 'Faild to login');
            return redirect()->back()->with($notification);
        }
    }
}
