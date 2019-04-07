<?php

namespace App\Repositories\Company;

use App\Company;
use App\Repositories\Company\CompanyContract;


class EloquentCompanyContract implements CompanyContract{


    public function createCompnay($request) {
        $contractor = new Contractor;
        $this->setCompanyProperties($contractor, $request);
        return $contractor->save();
    }
    
    
    
    private function setCompanyProperties($contractor, $request) {
     
        $contractor->company_name = $request->name;
        $contractor->cac_number = $request->cac_number;
        $contractor->address = $request->address;
        $contractor->city =  $feeder->city;
        $contractor->state =  $feeder->state;
        $contractor->country = $request->country;
        $contractor->email = $email;
        $contractor->website = $website;   
    }


}


?>