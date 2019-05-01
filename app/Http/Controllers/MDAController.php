<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\QueryException;
use App\Mda;
use App\Repositories\MDA\MdaContract;
use App\Repositories\Advert\AdvertContract;
use App\Repositories\BusinessCategory\BusinessCategoryContract;
use App\Repositories\TenderEligibility\TenderEligibilityContract;
use Auth;

class MDAController extends Controller{
  
    protected $repo;
    protected $advert_contract;
    protected $contract_category;
    protected $contract_requirement;

    public function __construct(MdaContract $mdaContract, AdvertContract $advertContract, 
    BusinessCategoryContract $categoryContract, TenderEligibilityContract $eligibilityContract){
        $this->middleware('auth');
        $this->repo = $mdaContract;
        $this->advert_contract = $advertContract;
        $this->contract_category = $categoryContract;
        $this->contract_requirement = $eligibilityContract;

    }

    public function index(){
        try {
            $mdas = $this->repo->listMdas();
            $categories = $this->contract_category->allBusinessCategories();
            $banks = ['Access bank', 'Citibank', 'Ecobank', 'Fidelity Bank', 'First Bank', 'First City Monument Bank', 'Guaranty Trust Bank', 'Heritage Bank', 'Keystone Bank', 'Skye Bank', 'Stanbic IBTC Bank', 'Sterling Bank', 'Union Bank', 'United Bank for Africa', 'Wema bank', 'Zenith bank', 'Jaiz bank'];
            if ($mdas) {
                return view('admin/manageMDA', ['mdas' => $mdas, 'categories' => $categories, 'banks' => $banks]);
            }
            else {
                return response()->json(['responseText' => 'Error retriving MDAs'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

    public function getMdas() {
        try {
            $mdas = $this->repo->listMdas();
            $categories = $this->contract_category->allBusinessCategories();
            $banks = ['Access bank', 'Citibank', 'Ecobank', 'Fidelity Bank', 'First Bank', 'First City Monument Bank', 'Guaranty Trust Bank', 'Heritage Bank', 'Keystone Bank', 'Skye Bank', 'Stanbic IBTC Bank', 'Sterling Bank', 'Union Bank', 'United Bank for Africa', 'Wema bank', 'Zenith bank', 'Jaiz bank'];
            if ($mdas) {
                return view('admin/manageMDA', ['mdas' => $mdas, 'categories' => $categories, 'banks' => $banks]);
            }
            else {
                return response()->json(['responseText' => 'Error retriving MDAs'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

    public function createAdvert(Request $request){
        $adverts = $this->advert_contract->listAdvertsByUserId(); 
        $categories = $this->contract_category->allBusinessCategories();
        return view('mda/createAdvert', ['adverts' => $adverts, 'categories' => $categories]);
    }

    public function bidRequirements(Request $request, $advertId){
        $advert = $this->advert_contract->getAdvertById($advertId); 
        $names = $this->contract_requirement->listAllEligibility();
        return view('mda/bidRequirements', ['advert' => $advert, 'names' => $names]);
    }


    public function storeMdas(Request $request){
        try {
            $data = $request->all();
         
            $mdas = $this->repo->create($data);

            if ($mdas == 1) {
                return response()->json(['success'=>'Record Added Succesfully.'], 200);
            }
            else {
                return response()->json(['error' => $mdas], 500);
            }
            
        } catch (\Exception $e) {
         return response()->json(['error' => $e->getMessage()], 500);
 
        }
    }



    public function mdasPreview($id) {

        try {
            $mdas = $this->repo->find($id);
            if ($mdas) {
                return view('admin/manageMDA_preview', ['mdas' => $mdas]);
            }
            else {
                return response()->json(['responseText' => 'Error showing MDAs'], 500);
            }
            
        } catch (\Exception $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
      
    }

    public function getMDAAdvertById($advertId) {
        $advert = $this->advert_contract->getAdsById($advertId);
       
        return view('mda.AdvertPreview')->with(['advert' => $advert]);
    }

    public function viewAdvertById($advertId) {
        $advert = $this->advert_contract->getAdsById($advertId);
       // dd($advert);
        return view('admin.AdvertPreview')->with(['advert' => $advert]);
    }

    public function viewAdvertOpeningById($advertId) {
        $advert = $this->advert_contract->getAdsById($advertId);
       // dd($advert);
        return view('admin.tools.AdvertPreview')->with(['advert' => $advert]);
    }


    public function getPasswordUpdate() {
        return view('mda.PasswordUpdate');
    }


    public function deleteMda(Request $request){
        try {
            $mda = $this->repo->removeMda($request->all());     
            if ($mda) {
                return response()->json(['success'=>' Mdas Deleted Successfully'], 200);
             } else {  
                return response()->json(['error' => 'Failed to Delete'], 500);
             }
        } catch (\Exception $e) {
         return response()->json(['response' => $e->getMessage()], 500);
        }
    }
}
