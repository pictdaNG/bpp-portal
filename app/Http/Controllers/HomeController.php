<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use App\Country;
use App\User;
use App\ContractorFile;
use Illuminate\Support\Facades\Auth;



use App\Repositories\Contractor\ContractorContract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;
use App\Repositories\ContractorJobs\ContractorJobsContract;
use App\Repositories\ContractorFinance\ContractorFinanceContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\ContractorMachinery\ContractorMachineryContract;
use App\Repositories\Compliance\ComplianceContract;  
use App\Repositories\ContractorCategory\ContractorCategoryContract;
use App\Repositories\Advert\AdvertContract;
use App\Repositories\MDA\MdaContract;

class HomeController extends Controller{

    protected $contract_personnel;
    protected $contract_job;
    protected $contract_finance;
    protected $contract_machinery;
    protected $company;
    protected $contract_compliance;
    protected $contract_directors;
    protected $contract_categories;
    protected $contract_adverts;
   // protected $contract_uploads;
    protected $uploads;
    protected $mdas;

    public function __construct(ContractorContract $contractorContract, ContractorPersonnelContract $contractorPersonnelContract,
            ContractorJobsContract $contractorJobsContract, ContractorFinanceContract $contractorFinanceContract ,
            ContractorMachineryContract $contractorMachinery, ComplianceContract $complianceContract, DirectorContract $directorContract,
            ContractorCategoryContract $categoryContract, AdvertContract $advertContract, MdaContract $mdaContract  ){

        $this->middleware('auth');
        $this->company = $contractorContract;
        $this->contract_personnel = $contractorPersonnelContract;
        $this->contract_finance = $contractorFinanceContract;
        $this->contract_job = $contractorJobsContract;
        $this->contract_machinery = $contractorMachinery;
        $this->contract_compliance = $complianceContract;
        $this->contract_directors = $directorContract;
        $this->contract_categories = $categoryContract;    
        $this->contract_advert = $advertContract;  
       // $this->contract_uploads =   
        $this->contract_mdas = $mdaContract;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){

        $user = Auth::user();
        if(strtolower($user->user_type) == strtolower("admin")){
            $compliances = $this->contract_compliance->listAllCompliance();
            $listMdas = $this->contract_mdas->listMdas();
            $activeAdverts = $this->contract_advert->listActiveAdverts();
            $closingBids = $this->contract_advert->closingBids();
            // dd($compliances);
            return view('adminHome', ['getCompliance' => $compliances, 'listMdas' => $listMdas, 'activeAdverts' => $activeAdverts, 
            'closingBids' => $closingBids]);
        }else if(strtolower($user->user_type) == strtolower("mda")){
            return view('MDAHome');
        }else if(strtolower($user->user_type) == strtolower("Contractor")){

            $companies = $this->company->getCompanyById();
            $personnels = $this->contract_personnel->getPersonnelsById();
            $jobs = $this->contract_job->getJobsById();
            $finances = $this->contract_finance->getFinancesById();
            $machines = $this->contract_machinery->getMachineriesById();
            $compliances = $this->contract_compliance->getCompliancesById(); 
            $directors = $this->contract_directors->getCompanyDirectors(); 
            $categories = $this->contract_categories->getCategoriesById();
           // $uploads = $this->contract_uploads->getUploadsById();
            $consultancy = $this->contract_job->getJobsByIdandCategory('2');
            $constructions = $this->contract_job->getJobsByIdandCategory('1');
            $supplies = $this->contract_job->getJobsByIdandCategory('3');
            $activeAdverts = $this->contract_advert->listActiveAdverts();
            $closingBids = $this->contract_advert->closingBids();

            $uploads = ContractorFile::where('user_id',  Auth::user()->id)->get();

            

            $percent = $this->percentage($personnels, $jobs, $finances, $companies, $directors, $categories, $machines, $compliances, $uploads );
            $jobs= $this->jobsDone($constructions, $supplies, $consultancy);
            
            $adverts = sizeof($activeAdverts) > 0 ? sizeof($activeAdverts) : 0;
 
            return view('home', ['percent_status' => $percent, 'jobs' => $jobs,
                                'adverts' => $adverts, 'activeAdverts' => $activeAdverts, 
                                'closingBids' => $closingBids]);
        }
        return redirect('/404');
    }


    public function jobsDone($constructions, $supplies, $consultancy) {
        $status = array();   
        $status['constructions'] =  (sizeof($constructions) > 0) ? sizeof($constructions) : 0;  
        $status['supplies'] =  (sizeof($supplies) > 0) ?  sizeof($supplies) : 0;  
        $status['consultancy'] = (sizeof($consultancy) > 0) ? sizeof($consultancy) : 0;  
        return $status;    
    }

    private function percentage($personnels, $jobs, $finances, $companies, $directors, $categories, $machines, $compliances, $uploads){
        $count = 0;
        $status = array();

        if(sizeof($personnels) > 0) {
            $count++;
            $status['personnels'] = true;  
        }
        else {
            $status['personnels'] = false;
        }

        if(sizeof($jobs) > 0) {
            $count++;
            $status['jobs'] = true;   
        }
        else {
            $status['jobs'] = false;
        }
        if(sizeof($finances) > 0) {
            $count++;
            $status['finances'] = true;        
        }
        else {
            $status['finances'] = false;
        }

        if($companies != null) {
            $count++;
            $status['companies'] = true;
        }
        else {
            $status['companies'] = false;
        }

        if(sizeof($directors) > 0) {
            $count++;
            $status['directors'] = true;   
        }
        else {
            $status['directors'] = false;

        }
        if(sizeof($categories) > 0) {
            $count++;
            $status['categories'] = true;    
        }else {
            $status['categories'] = false;
        }
        if($compliances !=null) {
            $count++;
            $status['compliances'] = true;
        }
        else {
            $status['compliances'] = false;

        }
        if(sizeof($machines) > 0) {
            $count++;
            $status['machines'] = true;
        }
        else {
            $status['machines'] = false;

        }
        if(sizeof($uploads) > 0) {
            $count++;
            $status['machines'] = true;
        }
        $status['percentage'] = round(($count/9)*100, 2);
         return $status;
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    
}
