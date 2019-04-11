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
use App\Repositories\BusinessCategory\BusinessCategoryContract;
use App\Repositories\BusinessSubCategory1\BusinessSubCategoryContract;
//use App\Repositories\BusinessCategory2\BusinessSubCategoryContract;
use App\Repositories\ContractorPersonnel\ContractorPersonnelContract;

use App\ContractorFile;

//use Illuminate\Events\Dispatcher;

class ContractorController extends Controller {
    protected $repo;
    protected $directorRepo;
    protected $contractorCategory;
    protected $ownerhip;
    protected $county;
    protected $business_cate;
    protected $business_cate1;
    protected $business_cate2;
    protected $contract_personnel;




    public function __construct(ContractorContract $contractorContract, DirectorContract $directorContract,
                 ContractorCategoryContract $contractorCategoryContract, OwnershipStructureContract $ownershipStructure, 
                 CountriesContract $country,  BusinessCategoryContract $businessCategory,
                 BusinessSubCategoryContract $businessCategory1, ContractorPersonnelContract $contractorPersonnel ) {
                    // when smiles fixes the sub category2 cantract name ish
                   // BusinessSubCategory2Contract $businessCategory2

        $this->middleware('auth');
        $this->repo = $contractorContract;
        $this->directorRepo = $directorContract;
        $this->contractorCategory = $contractorCategoryContract;
        $this->ownership = $ownershipStructure;
        $this->county = $country;
        $this->business_cate = $businessCategory;
        $this->business_cate1 = $businessCategory1;
        $this->contract_personnel = $contractorPersonnel;
       // $this->bussiness_cate2 = $businessCategory2;

    }
    
    
    public function registration(Request $request){
         $user = $this->repo->getUserById();
         $directors = $this->directorRepo->getCompanyDirectors();
         $categories = $this->contractorCategory->getCategoriesById();
         $owner_ship = $this->ownership->listOwnershipStructure();
         $countries = $this->county->allCountries();
         $b_categories = $this->business_cate->allBusinessCategories();
         $b_categories1 = $this->business_cate1->allBusinessSubCategory();
         $personnels = $this->contract_personnel->getPersonnelsById();
        // $b_categories2= $this->business_cate1->allBusinessSubCategory();



        return view('contractor/registration', ['user' => $user, 'directors' => $directors, 
        'contractorcategories' =>  $categories, 'ownerships' => $owner_ship,
        'countries' => $countries, 'allcategories' => $categories, 'contractorcategories' =>  $categories,
        'business_cates' => $b_categories, 'business_cates1' => $b_categories1,  'personnels' => $personnels,
        'cac' => ContractorFile::where('name', 'cac')->where('user_id', $user->id)->first(),
        'tcc' => ContractorFile::where('name', 'tcc')->where('user_id', $user->id)->first(),
        'tin' => ContractorFile::where('name', 'tin')->where('user_id', $user->id)->first(),
        'pencom' => ContractorFile::where('name', 'pencom')->where('user_id', $user->id)->first(),
        'itf' => ContractorFile::where('name', 'itf')->where('user_id', $user->id)->first(),
        'audited_account' => ContractorFile::where('name', 'audited_account')->where('user_id', $user->id)->first(),
        'swon_affidavit' => ContractorFile::where('name', 'swon_affidavit')->where('user_id', $user->id)->first(),
        'placcima' => ContractorFile::where('name', 'placcima')->where('user_id', $user->id)->first(),
        ]);

        //'businness_cates2' => $b_categories2,
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

    public function uploadContractorFile(Request $request){
        //Upload file return file name. associate file on storage with user_id
        $user = Auth::user();
        $name = $request->input('name');
        $cf = ContractorFile::where('user_id', $user->id)->where('name', $name)->first();
        if(!$cf){
            $cf = new ContractorFile;
            $cf->user_id = $user->id;
        }
        
        $file = $request->file('file');
        $mimeType = $file->getMimeType();
        $fileSize = $file->getSize();
        $destinationPath = 'uploads';
        $newFilePath = "C-" .$user->id . "-" .$file->getClientOriginalName();
        $displayName = $newFilePath;

        $cf->mime_type = $mimeType;
        $cf->size = $fileSize;
        $cf->name = $name;
        $cf->key = $displayName;
        if($file->move($destinationPath, $newFilePath)){
            $cf->save();
            return response()->json($cf, 200);
        }
        return response()->json(['status' => 'failure'], 400);
    }
    
    public function deleteContractorFile(Request $request){
        $user = Auth::user();
        $cf = ContractorFile::where('name', $request->input('name'))->where('user_id', $user->id)->first();
        $cf->delete();
        return response()->json(['status' => 'success'], 200);
    } 

}
