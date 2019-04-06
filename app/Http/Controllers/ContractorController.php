<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function registration(Request $request){
        return view('contractor/registration');
    }
}
