<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\MDA\MdaContract;
use App\Repositories\Advert\AdvertContract;
use Auth;

class MDAController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repo;
    protected $advert_contract;

    public function __construct(MdaContract $mdaContract, AdvertContract $advertContract)
    {
        $this->middleware('auth');
        $this->repo = $mdaContract;
        $this->advert_contract = $advertContract;

    }

    public function mda(Request $request){
        try {
            $mdas = $this->repo->listMdas();

            if ($mdas) {
                // return response()->json(['success'=> $mdas], 200);
                return view('admin/manageMDA', ['mdas' => $mdas]);
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
        return view('mda/createAdvert', ['adverts' => $adverts]);
    }

    public function bidRequirements(Request $request, $advertId){
        return view('mda/bidRequirements');
    }

    public function storeMdas(Request $request) {

        try {
            $data = $request->all();
            $mdas = $this->repo->create($data);

            if ($mdas) {
                return response()->json(['success'=>'MDA Added Succesfully.'], 200);
            }
            else {
                return response()->json(['responseText' => 'Error adding MDAs'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

}
