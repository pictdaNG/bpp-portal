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
        $this->$repo = $contractorContract;
    }
    
    public function registration(Request $request){
        return view('contractor/registration');
    }


    public function storeCompany(Request $request) {
        $this->validate($request, [
           'name' => 'required',
           'cac_number' => 'required|numeric|digits:10',
           'city' => 'required|alpha_num',
           'state'=> 'required',
           'country' => 'required',
           'email' => 'required|email|'
        ]);

       try {
           $contractor = $this->repo->create($request);
           if ($contractor) {
            return redirect()->route('areaoffice_index')
               ->with('success', 'Company successfully added');
            } else {
                return back()
                   ->withInput()
                   ->with('error', 'Could not create Company. Try again!');
            }
       } catch (QueryException $e) {
           return back()
               ->withInput()
               ->with('error', $e);
       }
    }

}
