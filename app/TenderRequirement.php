<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderRequirement extends Model{
    
     protected $fillable = ['name', 'lot_id', 'lot_no', 'advert_id', 'project_name', 'user_id' ];
    
}
