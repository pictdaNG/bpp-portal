<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\BusinessCategory\BusinessCategoryContract;

class BusinessCategoryController extends Controller
{
    protected $repo;

    public function __construct(BusinessCategoryContract $categoryContract){
         $this->middleware('auth');
        $this->repo = $categoryContract;
    }

    public function getAllBusinessCategories() {

        try {
            $categories = $this->repo->listAllBusinessCategories();

            if ($categories) {
                return response()->json(['success'=> $categories], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving Business Categories'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }
}
