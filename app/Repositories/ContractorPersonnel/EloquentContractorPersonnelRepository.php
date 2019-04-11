<?php

namespace App\Repositories\ContractorPersonnel;

use App\ContractorPersonnel;
use App\User;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorPersonnelRepository implements ContractorPersonnelContract{

    public function createPersonnel($request) { 
        $personnel = new ContractorPersonnel;
        $this->setContractorPersonnelProperties($personnel, $request);
        return $personnel->save();
    }


    public function getPersonnelsById() {
        return ContractorPersonnel::where("user_id", Auth::user()->id)->get();
    }

    public function removePersonnel($request){ 
        $data = $request['pids'];
        for($i=0; $i<sizeof($data); $i++){
       // foreach($request['ids'] as $id){
            $tmp = ContractorPersonnel::find($data[$i]);
            $tmp->delete();
        }
        return true;
    }

    private function setContractorPersonnelProperties($personnel, $request) {
        $user = Auth::user();
        $personnel->first_name = $request->first_name;
        $personnel->last_name = $request->last_name;
        $personnel->gender = $request->gender; 
        $personnel->nationality= $request->nationality;
        $personnel->passport_no = $request->passport_no;
        $personnel->national_id_no = $request->national_id_no;
        $personnel->employment_type = $request->employment_type;
        $personnel->experience_years = $request->experience_years;
        $personnel->joining_date = $request->joining_date;
        $personnel->school_name = $request->school_name;
        $personnel->qualification = $request->qualification;
        $personnel->country = $request->country;
        $personnel->graduation_year = $request->graduation_year;
        $personnel->regulatory_body = $request->regulatory_body;
        $personnel->membership_id_no = $request->membership_id_no;
        $personnel->project_involved = $request->project_involved;
        $personnel->description = $request->description;
        $personnel->user_id = $user->id;

    }


}


?>