<?php

namespace App\Repositories\ContractorJobs;

use App\ContractorJobs;
use App\User;
use App\Repositories\ContractorJobs\ContractorJobsContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorJobsRepository implements ContractorJobsContract{

    public function createJob($request) { 
        $contractorjob = new ContractorJobs;
        $this->setContractorJobsProperties($contractorjob, $request);
        return $contractorjob->save();
    }

    public function getJobsById() {
        return ContractorJobs::where("user_id", Auth::user()->id)->get();
    }

    public function getJobsByIdandCategory($category) {
        return ContractorJobs::where([
            'user_id' => Auth::user()->id,
            'job_category' => $category
            ])->get();
    }


    public function removeJob($request){ 
        $data = $request['jids'];
        try {
            for($i=0; $i<sizeof($data); $i++){
                $tmp = ContractorJobs::find($data[$i]);
                $tmp->delete();
            }
            return true;

        }
        catch(\Exception $e){
            return false;
        }
    }

    private function setContractorJobsProperties($contractorjob, $request) {
        $user = Auth::user();
        $contractorjob->job_category = $request->job_category;
        $contractorjob->sub_category = $request->sub_category;
        $contractorjob->sub_sub_category = $request->sub_sub_category; 
        $contractorjob->job_title= $request->job_title;
        $contractorjob->job_description = $request->job_description;
        $contractorjob->nationality = $request->nationality;
        $contractorjob->contact_phone = $request->contact_phone;
        $contractorjob->award_date = $request->award_date;
        $contractorjob->amount = $request->amount;  
        $contractorjob->user_id = $user->id;

    }

}

?>
