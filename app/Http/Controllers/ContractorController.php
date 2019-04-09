<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contractor\ContractorContract;
use App\Repositories\Director\DirectorContract;

//use Illuminate\Events\Dispatcher;


class ContractorController extends Controller {
    protected $repo;
    protected $directorRepo;

    public function __construct(ContractorContract $contractorContract, DirectorContract $directorContract){
        $this->middleware('auth');
        $this->repo = $contractorContract;
        $this->directorRepo = $directorContract;
    }
    
    public function registration(Request $request){
         $user = $this->repo->getUserById();

        return view('contractor/registration', ['user' => $user, 'directors' => $this->directorRepo->getCompanyDirectors() ]);
    }


    public function storeContractor(Request $request) {

       // dd((object)$request->all());

       try {
           $contractor = $this->repo->createContractor((object)$request->all());
             
           if ($contractor) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

}
