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
use App\Repositories\Contractor\ContractorContract;

class ReportController extends Controller
{
    protected $repo;
    protected $director;
    protected $personel;
    protected $category;
    protected $jobs;
    protected $finance;
    protected $machinery;
    protected $contractor;

    public function __construct(
        ContractorCategoryContract $contractorCategoryContract, 
        ContractorPersonnelContract $contractorPersonnelContract,
        ComplianceContract $complianceContract, 
        DirectorContract $directorContract, 
        ContractorJobsContract $contractorJobsContract, 
        ContractorFinanceContract $contractorFinanceContract,
        ContractorMachineryContract $contractorMachineryContract,
        ContractorContract $contractorContract
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
        $this->contractor = $contractorContract;
    }

    public function contractors(){
        try {
            $getCompliance = $this->repo->listAllCompliance();

            // dd($getCompliance);

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

    public function contractorPreview(Request $request, $id){

        try {
            $directors = $this->director->find($id);
            $personel = $this->personel->find($id);
            $categories = $this->category->find($id);
            $jobs = $this->jobs->find($id);
            $financies = $this->finance->find($id);
            $machineries = $this->machinery->find($id);
            $contractors = $this->contractor->find($id);
            $user = Auth::user();
            $getUploadfiles = ContractorFile::find($id);
            
            // if ($personel) {
                // return response()->json(['success'=> $getCompliance], 200);
                return view('admin/contractors_preview',[
                    'directors' => $directors, 
                    'personel' => $personel, 
                    'categories' => $categories, 
                    'jobs' => $jobs,
                    'financies' => $financies,
                    'machineries' => $machineries,
                    'getUploadfiles' => $getUploadfiles,
                    'contractors' => $contractors
                    ]);
            
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
       
    }
}
