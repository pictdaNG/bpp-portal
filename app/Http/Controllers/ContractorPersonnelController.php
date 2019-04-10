<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;


class ContractorPersonnelController extends Controller
{
    protected $repo;


    public function __construct(ContractorPersonnelContract $contractorPersonnelContract){

        $this->middleware('auth');
        $this->repo = $contractorPersonnelContract;
      
    }
    
    // public function registration(Request $request){
    //      $user = $this->repo->getUserById();
    //      $directors = $this->directorRepo->getCompanyDirectors();
    //      $categories = $this->contractorCategory->getCategoriesById();

    //     return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
    //     'contractorcategories' =>  $categories ]);
    // }


    public function storePersonnel(Request $request) {

       try {
           $personnel = $this->repo->createPersonnel((object)$request->all());
             
           if ($personnel) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

}
