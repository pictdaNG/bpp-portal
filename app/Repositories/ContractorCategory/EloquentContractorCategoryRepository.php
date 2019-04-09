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
        $this->setContractorCategoryProperties($category, $request);
        return $category->save();
    }


    public function getCategoriesById() {
        return ContractorCategory::where("user_id", Auth::user()->id)->get();
    }

    private function setContractorCategoryProperties($category, $request) {
        $user = Auth::user();
        $category->company_name = $user->category;
        $category->cac_number = $user->subcategory_1;
        $category->address = $request->subcategory_2; 
        $category->user_id = $user->id;

    }


}


?>