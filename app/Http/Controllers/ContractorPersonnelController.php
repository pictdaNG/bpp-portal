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
    

    public function personnels(){
        $personnels = $this->repo->getPersonnelsById();
        return response()->json($personnels, 200);
    }


    public function storePersonnel(Request $request) {
       try {
           $personnel = $this->repo->createPersonnel((object)$request->all());       
           if ($personnel) {
               return response()->json(['success'=>'Added new records.'], 200);        
            } else {     
                return response()->json(['responseText' => 'Failed to Add Record'], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

    public function deletePersonnel(Request $request) {
        try {
            $personnel = $this->repo->removePersonnel($request->all());  
            if ($personnel) {
                return response()->json(['success'=>' Records Deleted Successfully'], 200);
             } else {  
                return response()->json(['responseText' => 'Failed to Delete'], 500);
             }
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
        }
     }

}
