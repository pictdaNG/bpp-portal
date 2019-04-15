<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class AdvertLot extends Model{    
    protected $fillable = [   
        'project_status', 'project_name', 'project_id',   'package_no', 'lot_no', 'description', 'lot_category_id', 'lot_category_name',
        'advert_mode', 'lot_amount', 'tender_document', 'lot_requirement', 'custom_requirement',
     ];

}
