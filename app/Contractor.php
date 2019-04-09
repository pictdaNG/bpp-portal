<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $fillable = [
       
       'company_name', 'cac_number', 'address', 'city', 'country', 'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function director(){
        return $this->hasMany('App\Director');
    }
    
}
