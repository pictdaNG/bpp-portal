<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name', 'cac_number',
        'address', 'kaedc_city', 'state', 'country', 'email'
    ];
}
