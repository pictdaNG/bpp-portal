<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorCategory extends Model
{
    protected $fillable = [
       
        'category', 'subcategory_1', 'subcategory_2',  'user_id',
     ];
}
