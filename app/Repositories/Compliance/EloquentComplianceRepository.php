<?php

namespace App\Repositories\Compliance;

use App\Compliance;
use App\Repositories\Compliance\ComplianceContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentComplianceRepository implements ComplianceContract{

    public function createCompliance($request) {  
        $compliance = new Compliance;
        $this->setComplianceProperties($compliance, $request);
        return $compliance->save();
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
     

    }

    public function listAllCompliance()
    {
        return Compliance::all();
    }


}


?>