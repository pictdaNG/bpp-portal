<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

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
           if ($compliance) {
               return response()->json(['success'=>'Record Added Succesfully.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);

       }
    }

}
