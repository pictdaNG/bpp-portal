<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Repositories\Compliance\ComplianceContract;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repo;
    // protected $director;

    public function __construct(ComplianceContract $complianceContract){
        $this->middleware('auth');
        $this->repo = $complianceContract;
        // $this->director = $directorContract;
        // $this->personel = $contractorPersonnelContract;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $getCompliance = $this->repo->listAllCompliance();
        $user = Auth::user();
        if(strtolower($user->user_type) == strtolower("admin")){
            return view('adminHome',  ['getCompliance' => $getCompliance]);
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
}
