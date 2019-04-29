<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use App\Repositories\Advert\AdvertContract;
use App\Repositories\BusinessCategory\BusinessCategoryContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\ContractorCategory\ContractorCategoryContract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;
use App\Repositories\ContractorJobs\ContractorJobsContract;
use App\Repositories\ContractorFinance\ContractorFinanceContract;
use App\Repositories\ContractorMachinery\ContractorMachineryContract;
use App\ContractorFile;
use Illuminate\Support\Facades\Auth;





class AdvertController extends Controller{

    protected $repo;
    protected $contract_category;

    protected $directorRepo;
    protected $contractorCategory; 
    protected $contract_personnel;
    protected $contract_job;
    protected $contractFinance;
    protected $machinery;


    public function __construct(AdvertContract $advertContract, BusinessCategoryContract $categoryContract,
                             DirectorContract $directorContract, ContractorCategoryContract $contractorCategoryContract,
                            ContractorJobsContract $contractorJob, ContractorPersonnelContract $contractorPersonnel,
                            ContractorFinanceContract $contractorFinanceContract, ContractorMachineryContract $contractorMachinery){
            // $this->middleware('auth');
            $this->repo = $advertContract;
            $this->contract_category = $categoryContract;


            $this->directorRepo = $directorContract;
            $this->contract_personnel = $contractorPersonnel;
            $this->contract_job = $contractorJob;
            $this->contractFinance = $contractorFinanceContract;
            $this->machinery = $contractorMachinery;
            $this->contractorCategory = $contractorCategoryContract;
    }

    public function Adverts(){
        $adverts = $this->repo->listAdvertsByUserId();
        $categories = $this->contract_category->listAllBusinessCategories();
      //  $lots = $this->repo->listAdvertLotsByAdverts();
        return response()->json(['adverts' => $adverts, 'categories' => $categories], 200);
    }



    private function registrationStatus(){

        $count = 0;
        $status = array();

    
        $personnels = $this->contract_personnel->getPersonnelsById();
        $jobs = $this->contract_job->getJobsById();
        $finances = $this->contractFinance->getFinancesById();
        $machines = $this->machinery->getMachineriesById();
        $directors = $this->directorRepo->getCompanyDirectors(); 
        $categories = $this->contractorCategory->getCategoriesById();
        $uploads = ContractorFile::where('user_id',  Auth::user()->id)->get();

        if(sizeof($personnels) > 0) {
            $count++;
            $status['personnels'] = true;  
        }
        
        if(sizeof($jobs) > 0) {
            $count++;
            $status['jobs'] = true;   
        }
        
        if(sizeof($finances) > 0) {
            $count++;
            $status['finances'] = true;        
        }
        
        if(sizeof($directors) > 0) {
            $count++;
            $status['directors'] = true;   
        }
        
        if(sizeof($categories) > 0) {
            $count++;
            $status['categories'] = true;    
        }
        if(sizeof($machines) > 0) {
            $count++;
            $status['machines'] = true;
        }
       
        if(sizeof($uploads) > 0) {
            $count++;
            $status['uploads'] = true;
        }
        
        $status['percentage'] = round(($count/7)*100, 2);
         return $status;
    }


    public function storeAdvert(Request $request) {
       try {
            
           if ($this->repo->createAdvert((object)$request->all())) {
                return response()->json(['success' => 'Record Added Successfully'], 200);
            } 
            else {     
                return response()->json(['responseText' => 'Failed to Add Record'], 500);
            }
        } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }

    public function updateAdvert(Request $request) {
        try {
             
            if ($this->repo->editAdvert((object)$request->all())) {
                 return response()->json(['success' => 'Record Updated Successfully'], 200);
             } 
             else {     
                 return response()->json(['responseText' => 'Failed to Add Record'], 500);
             }
         } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
        }
     }


    public function deleteAdvert(Request $request) {
        try {
            $advert = $this->repo->removeAdvert($request); 
            // $adverts = $this->repo->listAdvertsByUserId(); 
            if ($advert) {
                return response()->json(['success' => 'records deleted successfully'], 200);
                //return view('mda.createAdvert', ['adverts' => $adverts]);        
            } else {  
                return response()->json(['success' => 'failed to delete records'], 500);
             }
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
        }
     }

     public function getAdvertById($advertId) {
        $advert = $this->repo->getAdsById($advertId);
        $registrationStatus = $this->registrationStatus();

        $notification = array(
            'message' => 'Sorry You have to complete Your Profile Update!', 
            'alert-type' => 'error'
        );

        //dd($registrationStatus['percentage']);
        if($registrationStatus['percentage'] !== 100.0) {
            return redirect()->back()->with($notification);
        }
       
        return view('contractor.AdvertPreview')->with(['advert' => $advert, 'registrationStatus' => $registrationStatus]);
    }

    public function getSubmittedAdvertById($advertId) {
        $advert = $this->repo->getAdsById($advertId);
        return view('contractor.SubmittedAdvertPreview')->with(['advert' => $advert]);
    }

    public function getAdverts(){
        $adverts = $this->repo->listAllAdverts();
        return view('admin.AdvertList')->with(['adverts' => $adverts]); 
    }


    public function getAdvertsOpening(){
        $adverts = $this->repo->listApprovedAdverts();
        return view('admin.BidOpening')->with(['adverts' => $adverts]); 
    }
    
    public function toggleAdvert($advertId, $status) {
        $toggle = $this->repo->updateAdvertStatus($advertId, $status);
        $adverts = $this->repo->listAllAdverts();
        $notification = array(
            'message' => 'Successfully Toggled Advert State!', 
            'alert-type' => 'success'
        );
        return redirect()->route('adminAdverts')->with(['adverts' => $adverts])->with($notification); 

    }

    public function getAdvertByCatId($catId){
       
        $adverts = $this->repo->getAdsByCatId($catId);
        return view('contractor.DisplayCategoryAdvert')->with(['adverts' => $adverts]); 
    }

}
