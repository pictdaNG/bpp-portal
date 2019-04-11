<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contractor\ContractorContract;
use App\Repositories\Director\DirectorContract;
use App\Repositories\OwnershipStructure\OwnershipStructureContract;
use App\Repositories\Countries\CountriesContract;


use App\Repositories\ContractorCategory\ContractorCategoryContract;


//use Illuminate\Events\Dispatcher;


class ContractorController extends Controller {
    protected $repo;
    protected $directorRepo;
    protected $contractorCategory;
    protected $ownerhip;
    protected $county;


    public function __construct(ContractorContract $contractorContract, DirectorContract $directorContract,
                 ContractorCategoryContract $contractorCategoryContract,
                 OwnershipStructureContract $ownershipStructure, 
                 CountriesContract $country){

        $this->middleware('auth');
        $this->repo = $contractorContract;
        $this->directorRepo = $directorContract;
        $this->contractorCategory = $contractorCategoryContract;
        $this->ownership = $ownershipStructure;
        $this->county = $country;
    }
    
    public function registration(Request $request){
         $user = $this->repo->getUserById();
         $directors = $this->directorRepo->getCompanyDirectors();
         $categories = $this->contractorCategory->getCategoriesById();
         $owner_ship = $this->ownership->listOwnershipStructure();
         $countries = $this->county->allCountries();

        return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
        'contractorcategories' =>  $categories, 'ownerships' => $owner_ship,
        'countries' => $countries, 'allcategories' => $categories,  ]);
    }


    public function storeContractor(Request $request) {

       try {
           $contractor = $this->repo->createContractor((object)$request->all());
             
           if ($contractor) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }


    public function reportsContractor() {
        echo("contracts reports data table");
        return view('contractor.reports');
    }

}
