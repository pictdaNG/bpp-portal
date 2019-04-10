<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorJobs extends Model{
    protected $fillable = [
       
        'job_category', 'sub_category', 'sub_sub_category', 'job_title', 'job_description', 'nationality', 'contact_phone',
        'award_date', 'amount', 
     ];
}
