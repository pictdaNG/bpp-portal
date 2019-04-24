<?php

namespace App\Repositories\Compliance;

use App\Compliance;
use App\Repositories\Compliance\ComplianceContract;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;


class EloquentComplianceRepository implements ComplianceContract{

    public function createCompliance($request) {  
        $compliance = new Compliance;
        $this->setComplianceProperties($compliance, $request);

        $search = Compliance::where('user_id', Auth::user()->id)->get()->first();
          //2019-04-03 //2019-04-22
        if($compliance->cac_date_of_reg > Carbon::now()->isoFormat('YYYY-MM-D')) {
            return 2;
        }
       
        else if($compliance->pension_expiring_date < Carbon::now()->isoFormat('YYYY-MM-D')) {
            return 4;
        }

        else if($compliance->pension_no_of_employee < 1) {
            return 5;
        }
        else if($compliance->itf_payment_date > Carbon::now()->isoFormat('YYYY-MM-D')) {
            return 3;
        }

        if($search) {
            $this->setComplianceProperties($search, $request);
             $search->save();
            return 1;
        }
        else {
            $this->setComplianceProperties($compliance, $request);
            $compliance->save();
            return 1;

        }
        return 0;
    }

    public function getCompliancesById(){
        return Compliance::where("user_id", Auth::user()->id)->first();

    }


    private function setComplianceProperties($compliance, $request) {
       // dd($request);
        $user = Auth::user();
        $compliance->company_name = $user->name;
        $compliance->parent_company = $request->parent_company;
        $compliance->cac_date_of_reg = $request->cac_date_of_reg;
        $compliance->cac_number =  $user->cac;
        $compliance->tcc_no = $request->tcc_no;
        $compliance->tcc_tin_no = $request->tcc_tin_no;
        $compliance->tcc_ownership_structure = $request->tcc_ownership_structure;
        $compliance->tcc_company_ownership = $request->tcc_company_ownership;
        $compliance->pension_employer_code= $request->pension_employer_code;
        $compliance->pension_certificate_number = $request->pension_certificate_number;
        $compliance->pension_expiring_date =  $request->pension_expiring_date;
        $compliance->pension_no_of_employee = $request->pension_no_of_employee;
        $compliance->itf_registration_no=  $request->itf_registration_no;
        $compliance->itf_certificate_no =  $request->itf_certificate_no;
        $compliance->itf_payment_date = $request->itf_payment_date;
        $compliance->user_id = $user->id;
     

    }

    public function listAllCompliance()
    {
        return Compliance::all();
    }


}


?>