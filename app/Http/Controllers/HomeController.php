<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Country;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if(strtolower($user->user_type) == strtolower("admin")){
            return view('adminHome');
        }else if(strtolower($user->user_type) == strtolower("mda")){
            return view('MDAHome');
        }else if(strtolower($user->user_type) == strtolower("Contractor")){
            return view('home');
        }
        return redirect('/404');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function country() {
        $countries = Country::all()->pluck('name', 'id');
        return view('welcome', compact('countries'));
    }

    public function getStates($id) {
        $states = State::where('country_id', $id)->pluck('name', 'id');
        return json_encode($states);
    }
}
