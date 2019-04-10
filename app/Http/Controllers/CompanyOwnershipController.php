<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\CompanyOwnership\CompanyOwnershipContract;

class CompanyOwnershipController extends Controller
{
    protected $repo;

    public function __construct(CompanyOwnershipContract $companyOwnershipContract){
        // $this->middleware('auth');
        $this->repo = $companyOwnershipContract;
    }

    public function getCompanyOwnership() {

        try {
            $companyOwnership = $this->repo->listCompanyOwnership();

            if ($companyOwnership) {
                return response()->json(['success'=> $companyOwnership], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving Equipments type'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

    public function storeCompanyOwnership(Request $request) {

        try {
            $data = $request->all();
            $companyOwnership = $this->repo->create($data);

            if ($companyOwnership) {
                return response()->json(['success'=>'Company Ownership Added Succesfully.'], 200);
            }
            else {
                return response()->json(['responseText' => 'Error adding Company Ownership'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }
}
