<?php

namespace App\Repositories\ContractorJobs;

use App\ContractorJobs;
use App\BusinessCategory;
use App\BusinessSubCategory1;
use App\BusinessSubCategory2;
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
            'categoryId' => $category
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

        $category = BusinessCategory::where('name', $request->job_category )->first();
        $category1 = BusinessSubCategory1::where('name', $request->sub_category )->first();
        $category2 = BusinessSubCategory2::where('name', $request->sub_sub_category )->first();

        $contractorjob->job_category = $request->job_category;
        $contractorjob->categoryId = $category->id;
        $contractorjob->sub_category = $request->sub_category;
        $contractorjob->sub_categoryId = $category1->id;
        $contractorjob->sub_sub_category = $request->sub_sub_category; 
        $contractorjob->sub_sub_categoryId = $category2->id; 
        $contractorjob->job_title= $request->job_title;
        $contractorjob->job_description = $request->job_description;
        $contractorjob->client = $request->client;
        $contractorjob->contact_phone = $request->contact_phone;
        $contractorjob->award_date = $request->award_date;
        $contractorjob->amount = $request->amount;  
        $contractorjob->user_id = $user->id;

    }

}

?>
