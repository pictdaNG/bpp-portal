<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use App\ContractorFile;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Compliance\ComplianceContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;
use App\Repositories\ContractorCategory\ContractorCategoryContract;
use App\Repositories\ContractorJobs\ContractorJobsContract;
use App\Repositories\ContractorFinance\ContractorFinanceContract;
use App\Repositories\ContractorMachinery\ContractorMachineryContract;

class ReportController extends Controller
{
    protected $repo;
    protected $director;
    protected $personel;
    protected $category;
    protected $jobs;
    protected $finance;
    protected $machinery;

    public function __construct(
        ContractorCategoryContract $contractorCategoryContract, 
        ContractorPersonnelContract $contractorPersonnelContract,
        ComplianceContract $complianceContract, 
        DirectorContract $directorContract, 
        ContractorJobsContract $contractorJobsContract, 
        ContractorFinanceContract $contractorFinanceContract,
        ContractorMachineryContract $contractorMachineryContract
    )
    {
        $this->middleware('auth');
        $this->repo = $complianceContract;
        $this->director = $directorContract;
        $this->personel = $contractorPersonnelContract;
        $this->category = $contractorCategoryContract;
        $this->jobs = $contractorJobsContract;
        $this->finance = $contractorFinanceContract;
        $this->machinery = $contractorMachineryContract;
    }

    public function contractors(){
        try {
            $getCompliance = $this->repo->listAllCompliance();

            if ($getCompliance) {
                // return response()->json(['success'=> $getCompliance], 200);
                return view('admin/contractors', ['getCompliance' => $getCompliance]);
            }
            else {
                return response()->json(['responseText' => 'Error retriving contractor compliance'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
        
    }

    public function contractorPreview(Request $request){

        try {
            $directors = $this->director->getCompanyDirectors();
            $personel = $this->personel->getPersonnelsById();
            $categories = $this->category->getCategoriesById();
            $jobs = $this->jobs->getJobsById();
            $financies = $this->finance->getFinancesById();
            $machineries = $this->machinery->getMachineriesById();
            $user = Auth::user();
            $getUploadfiles = ContractorFile::where('user_id', $user->id)->get();
 
            if ($personel) {
                // return response()->json(['success'=> $getCompliance], 200);
                return view('admin/contractors_preview',[
                    'directors' => $directors, 
                    'personel' => $personel, 
                    'categories' => $categories, 
                    'jobs' => $jobs,
                    'financies' => $financies,
                    'machineries' => $machineries,
                    'getUploadfiles' => $getUploadfiles
                    ]);
            }
            else {
                return response()->json(['responseText' => 'Error retriving contractor compliance'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
       
    }
}
