<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContractorJobs\ContractorJobsContract;


class ContractorJobsController extends Controller {

    protected $repo;


    public function __construct(ContractorJobsContract $contractorjobsContract){

        $this->middleware('auth');
        $this->repo = $contractorjobsContract;
      
    }
    
    // public function registration(Request $request){
    //      $user = $this->repo->getUserById();
    //      $directors = $this->directorRepo->getCompanyDirectors();
    //      $categories = $this->contractorCategory->getCategoriesById();

    //     return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
    //     'contractorcategories' =>  $categories ]);
    // }


    public function storeJob(Request $request) {

       try {
           $job= $this->repo->createJob((object)$request->all());
             
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
}
