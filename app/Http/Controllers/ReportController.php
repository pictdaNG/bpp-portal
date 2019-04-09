<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function contractors(Request $request){
        return view('admin/contractors');
    }

    public function contractorPreview(Request $request){
        return view('admin/contractors_preview');
    }
}
