<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContractorCategory\ContractorCategoryContract;

class ContractorCategoryController extends Controller{
    public function __construct(ContractorCategoryContract $categoryContract){
        $this->middleware('auth');
        $this->repo = $categoryContract;
    }
       
    public function storeCategory(Request $request) {

       try {
           dd($request->all());
           $category = $this->repo->createCategory((object)$request->all());
             
           if ($category) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
           dd($e);
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

}
