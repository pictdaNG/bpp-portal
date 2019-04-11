<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\BusinessSubCategory2\BusinessSubCategoryContract;

class BusinessSubCategory2Controller extends Controller
{
    protected $repo;

    public function __construct(BusinessSubCategoryContract $businessSubCategoryContract){
        // $this->middleware('auth');
        $this->repo = $businessSubCategoryContract;
    }

    public function getAllBusinessSubCategories() {

        try {
            $businessSubCategory = $this->repo->listBusinessSubCategory();

            if ($businessSubCategory) {
                return response()->json(['success'=> $businessSubCategory], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving Business Sub Categories 2'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }
}
