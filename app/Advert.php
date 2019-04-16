<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model{


    protected $fillable = [
       
        'name', 'budget_year',  'advert_type', 'advert_mode', 'introduction', 'advert_publish_date',
        'bid_opening_date', 'status', 
     ];


     public function user(){
        return $this->belongsTo('App\User');
    }

     public function advertLot(){
        return $this->hasMany('App\AdvertLot');
    }
    
}
