<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContractorFinance\ContractorFinanceContract;


class ContractorFinanceController extends Controller {

    protected $repo;


    public function __construct(ContractorFinanceContract $contractorFinanceContract){

        $this->middleware('auth');
        $this->repo = $contractorFinanceContract;
      
    }
    
    // public function registration(Request $request){
    //      $user = $this->repo->getUserById();
    //      $directors = $this->directorRepo->getCompanyDirectors();
    //      $categories = $this->contractorCategory->getCategoriesById();

    //     return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
    //     'contractorcategories' =>  $categories ]);
    // }


    public function storeFinance(Request $request) {

       try {
           $job= $this->repo->createFinance((object)$request->all());
             
           if ($job) {
               return response()->json(['success'=>'Added new record.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }
    //
    //
}


