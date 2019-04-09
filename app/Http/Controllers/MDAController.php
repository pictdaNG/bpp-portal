<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MDAController extends Controller
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

    public function mda(Request $request){
        return view('admin/manageMDA');
    }

    public function createAdvert(Request $request){
        return view('mda/createAdvert');
    }

    public function bidRequirements(Request $request, $advertId){
        return view('mda/bidRequirements');
    }
}
