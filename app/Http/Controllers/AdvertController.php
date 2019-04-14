<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use App\Repositories\Advert\AdvertContract;


class AdvertController extends Controller{

    protected $repo;

    public function __construct(AdvertContract $advertContract){
        // $this->middleware('auth');
        $this->repo = $advertContract;
    }

    public function Adverts(){
        $adverts = $this->repo->listAdvertsByUserId();
        return response()->json($adverts, 200);
    }


    public function storeAdvert(Request $request) {
       try {
            
           if ($this->repo->createAdvert((object)$request->all())) {
            return response()->json(['success' => 'Record Added Successfully'], 200);
        } else {     
                return response()->json(['responseText' => 'Failed to Add Record'], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }


    public function deleteAdvert(Request $request) {
        try {
            $advert = $this->repo->removeAdvert($request); 
            $adverts = $this->repo->listAdvertsByUserId(); 
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

}
