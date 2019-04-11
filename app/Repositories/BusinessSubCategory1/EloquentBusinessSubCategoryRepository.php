<?php
namespace App\Repositories\BusinessSubCategory1;

use App\BusinessSubCategory1;

class EloquentBusinessSubCategoryRepository implements BusinessSubCategoryContract
{
    public function create($requestData)
    {
       return BusinessSubCategory1::create($requestData);
    }
    
    public function find($id)
    {
       return BusinessSubCategory1::find($id);
    }
    
    
    public function listBusinessSubCategory()
    {
        return BusinessSubCategory1::all()->pluck('name', 'id');
    }


    public function allBusinessSubCategory()
    {
        return BusinessSubCategory1::all();
    }
    
    
    public function destroy($id)
    {
        $client = BusinessSubCategory1::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return BusinessSubCategory1::find($id)->update($requestData);
    }
    
}