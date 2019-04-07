<?php

namespace App\Repositories\Contractor;

use App\Contractor;
use App\Repositories\Contractor\ContractorContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorRepository implements ContractorContract{

 
    public function createContractor($request) {
       
       
        $contractor = new Contractor;
        $this->setContractorProperties($contractor, $request);
        return $contractor->save();
    }

   
    
    
    private function setContractorProperties($contractor, $request) {
        $contractor->company_name = $request->company_name;
        $contractor->cac_number = $request->cac_number;
        $contractor->address = $request->address;
        $contractor->city =  $request->city;
        $contractor->country = $request->country;
        $contractor->email = $request->email;
        $contractor->user_id = Auth::user()->id;
        $contractor->website = $request->website; 

    }


}


?>