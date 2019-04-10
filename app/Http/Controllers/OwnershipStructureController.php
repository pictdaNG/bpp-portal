<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\OwnershipStructure\OwnershipStructureContract;

class OwnershipStructureController extends Controller
{
    protected $repo;

    public function __construct(OwnershipStructureContract $ownershipContract){
        // $this->middleware('auth');
        $this->repo = $ownershipContract;
    }

    public function index() {
        return view('admin.tools.ownership');
    }

    public function storeOwnershipStructure(Request $request) {

        try {
            $data = $request->all();
            $ownership = $this->repo->create($data);

            if ($ownership) {
                return response()->json(['success'=>'Record Added Succesfully.'], 200);
            }
            else {
                return response()->json(['responseText' => 'Error adding record'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

    public function getOwnershipStructure() {

        try {
            $ownership = $this->repo->listOwnershipStructure();

            if ($ownership) {
                return response()->json(['success'=> $ownership], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving ownership structure'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }
}
