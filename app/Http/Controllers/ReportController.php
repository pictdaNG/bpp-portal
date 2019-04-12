<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\Compliance\ComplianceContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;

class ReportController extends Controller
{
    protected $repo;
    protected $director;

    public function __construct(ContractorPersonnelContract $contractorPersonnelContract, ComplianceContract $complianceContract, DirectorContract $directorContract){
        $this->middleware('auth');
        $this->repo = $complianceContract;
        $this->director = $directorContract;
        $this->personel = $contractorPersonnelContract;
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

            if ($personel) {
                // return response()->json(['success'=> $getCompliance], 200);
                return view('admin/contractors_preview',['directors' => $directors, 'personel' => $personel]);
            }
            else {
                return response()->json(['responseText' => 'Error retriving contractor compliance'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
       
    }
}
