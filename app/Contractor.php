<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $fillable = [
        'company_name', 'cac_number',
        'address', 'city', 'country', 'email', 'user_id',
    ];
    
}
