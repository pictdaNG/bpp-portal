<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model {
    // protected $primaryKey = 'codes';
    // public $incrementing = false;
    
    protected $fillable = [
        'company_name', 'cac_number',
        'address', 'kaedc_city', 'state', 'country', 'email'
    ];
}
