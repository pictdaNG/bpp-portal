<?php
namespace App\Repositories\BusinessCategory;

use App\BusinessCategory;

class EloquentBusinessCategoryRepository implements BusinessCategoryContract
{
   
    public function listAllBusinessCategories()
    {
        return BusinessCategory::all()->pluck('name', 'id');
    }
    
}