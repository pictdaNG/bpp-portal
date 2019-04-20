<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use App\Repositories\Advert\AdvertContract;
use App\Repositories\BusinessCategory\BusinessCategoryContract;



class AdvertController extends Controller{

    protected $repo;
    protected $contract_category;

    public function __construct(AdvertContract $advertContract, BusinessCategoryContract $categoryContract){
        // $this->middleware('auth');
        $this->repo = $advertContract;
        $this->contract_category = $categoryContract;
    }

    public function Adverts(){
        $adverts = $this->repo->listAdvertsByUserId();
        $categories = $this->contract_category->listAllBusinessCategories();
      //  $lots = $this->repo->listAdvertLotsByAdverts();
        return response()->json(['adverts' => $adverts, 'categories' => $categories], 200);
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
                 return response()->json(['success' => 'Record Added Successfully'], 200);
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
       // dd($advert);
        return view('contractor.AdvertPreview')->with(['advert' => $advert]);
    }

    public function getSubmittedAdvertById($advertId) {
        $advert = $this->repo->getAdsById($advertId);
        return view('contractor.SubmittedAdvertPreview')->with(['advert' => $advert]);
    }

}
