<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContractorMachinery\ContractorMachineryContract;


class ContractorMachineryController extends Controller {
    
    protected $repo;


    public function __construct(ContractorMachineryContract $contractorMachineryContract){

        $this->middleware('auth');
        $this->repo = $contractorMachineryContract;
      
    }
    
    // public function registration(Request $request){
    //      $user = $this->repo->getUserById();
    //      $directors = $this->directorRepo->getCompanyDirectors();
    //      $categories = $this->contractorCategory->getCategoriesById();

    //     return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
    //     'contractorcategories' =>  $categories ]);
    // }


    public function storeMachinery(Request $request) {

       try {
           $machinery = $this->repo->createMachinery((object)$request->all());
             
           if ($machinery) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }
}
