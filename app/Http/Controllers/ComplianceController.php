<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Session;

use App\Repositories\Compliance\ComplianceContract;


class ComplianceController extends Controller{
    protected $repo;

    public function __construct(ComplianceContract $complianceContract){
        $this->middleware('auth');
        $this->repo = $complianceContract;
    }
    


    public function storeCompliance(Request $request) {

       try {
           $compliance = $this->repo->createCompliance((object)$request->all());
           if ($compliance == 1) {
               return response()->json(['success'=>'Record Added Succesfully.'], 200);
               
            } else if($compliance == 2 ) {
              
                return response()->json(['err'=>'Invalid CAC Registration Date'], 500);  
            } 
            else if($compliance == 3 ) {
                
                return response()->json(['err'=>'Invalid ITF Registration Date'], 500);  
            } 
            else if($compliance == 4 ) {
                
                return response()->json(['err'=>'Invalid Pencom Expiry Date'], 500);  
            } 
            else if($compliance == 5 ) {
                
                return response()->json(['err' => 'Invalid Employee Number'], 500);  
            } 
            else { 
                return response()->json(['responseText' => 'Error occured'], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);

       }
    }

    public function getCompliance() {

        try {
            $getCompliance = $this->repo->listAllCompliance();

            if ($getCompliance) {
                return response()->json(['success'=> $getCompliance], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving contractor compliance'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

}
