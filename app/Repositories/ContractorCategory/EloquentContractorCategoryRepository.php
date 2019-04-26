<?php

namespace App\Repositories\ContractorCategory;

use App\ContractorCategory;
use App\User;
use App\Repositories\ContractorCategory\ContractorCategoryContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorCategoryRepository implements ContractorCategoryContract{

    public function createCategory($request) { 
        //dd($request); 
        $category = new ContractorCategory;
        $search = ContractorCategory::where('category', $request->category)->get();
        if(sizeof($search) > 0) {
            return 'Category Already Exist';
        }
        $this->setContractorCategoryProperties($category, $request);
        $category->save();
        return 1;
    }


    public function getCategoriesById() {
        return ContractorCategory::where("user_id", Auth::user()->id)->get();
    }

    public function getCategories() {
        return ContractorCategory::all();
    }


    public function removeCategory($request){ 
        try {
          //  dd($request);
            $data = $request['cates'];
            for($i=0; $i<sizeof($data); $i++){
                $tmp = ContractorCategory::find($data[$i]);
                $tmp->delete();
                
            }
            return true;

        }
        catch(\Exception $e){
            dd($e->getMessage());
            return false;
        } 
    }

    private function setContractorCategoryProperties($category, $request) {
        $user = Auth::user();
        $category->category = $request->category;
        $category->subcategory_1 = $request->subcategory_1;
        $category->subcategory_2 = $request->subcategory_2; 
        $category->user_id = $user->id;

    }


}


?>