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
    
    public function getFinances(){
        $finances = $this->repo->getFinancesById();
        return response()->json(['finances'=> $finances], 200);
    }

    public function storeFinance(Request $request) {
       try {
           $finance= $this->repo->createFinance((object)$request->all());    
           if ($finance) {
               return response()->json(['success'=>'Added new record.'], 200);        
            } else {    
                return response()->json(['responseText' => 'Error occured try again'], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

    public function deleteFinance(Request $request) {
        try {
            $finance = $this->repo->removeFinance($request->all());  
            if ($finance) {
                return response()->json(['success'=>' Records Deleted Successfully'], 200);
             } else {  
                return response()->json(['responseText' => 'Failed to Delete'], 500);
             }
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
        }
     }

}


