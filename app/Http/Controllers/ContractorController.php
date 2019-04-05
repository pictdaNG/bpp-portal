<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function registration(Request $request){
        return view('contractor/registration');
    }
}
