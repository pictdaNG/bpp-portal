<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TenderRequirement\TenderRequirementContract;


class TenderRequirementController extends Controller{
    protected $repo;


    public function __construct(TenderRequirementContract $tenderRequirementContract){
        // $this->middleware('auth');
        $this->repo = $tenderRequirementContract;
    }

    public function tenderRequirements(){
        $adverts = $this->repo->listRequirementsByLotId($lotId);
      //  $lots = $this->repo->listAdvertLotsByAdverts();
       // return response()->json(['adverts' =>$adverts], 200);
    }


    public function storeTenderRequirement(Request $request) {
       try {
          // dd($request);
        if ($this->repo->createTenderRequirement($request)) {
            return redirect()->back();
        } else {     
                return response()->json(['responseText' => 'Failed to Add Record'], 500);
            }
       } catch (\Exception $e) {
        return response()->json(['responseeeee' => $e->getMessage()], 500);
       }
    }


    // public function deleteAdvertLot(Request $request) {
    //     try {
    //         $advert = $this->repo->removeAdvertLot($request); 
    //         $adverts = $this->repo->listAdvertLotsByUserId(); 
    //         if ($advert) {
    //             return response()->json(['success' => 'records deleted successfully'], 200);
    //             //return view('mda.createAdvert', ['adverts' => $adverts]);        
    //         } else {  
    //             return response()->json(['success' => 'failed to delete records'], 500);
    //          }
    //     } catch (QueryException $e) {
    //      return response()->json(['response' => $e->getMessage()], 500);
    //     }
    //  }
    
}
