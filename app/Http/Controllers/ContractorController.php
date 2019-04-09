<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\Contractor\ContractorContract;
//use Illuminate\Events\Dispatcher;


class ContractorController extends Controller {
    protected $repo;

    public function __construct(ContractorContract $contractorContract){
        $this->middleware('auth');
        $this->repo = $contractorContract;
    }
    
    public function registration(Request $request){
        return view('contractor/registration');
    }


    public function storeContractor(Request $request) {
        $this->validate($request, [
           'company_name' => 'required',
           'cac_number' => 'required|numeric|digits:10',
           'city' => 'required|alpha_num',
           'country' => 'required',
           'email' => 'required|email'
        ]);

       // dd((object)$request->all());

       try {
           $contractor = $this->repo->createContractor((object)$request->all());
             
           if ($contractor) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['error'=>$validator->errors()->all()]);
            }
       } catch (QueryException $e) {
           return back()
               ->withInput()
               ->with('error', $e);
       }
    }


    public function reportsContractor() {
        echo("contracts reports data table");
        return view('contractor.reports');
    }

}
