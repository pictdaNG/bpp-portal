<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

use App\Repositories\Qualifications\QualificationContract;

class QualificationController extends Controller
{
    protected $repo;

    public function __construct(QualificationContract $qualificationContract){
        // $this->middleware('auth');
        $this->repo = $qualificationContract;
    }

    public function storeQualifications(Request $request) {

        try {
            $data = $request->all();
            $qualification = $this->repo->create($data);

            if ($qualification) {
                return response()->json(['success'=>'Qualifications Added Succesfully.'], 200);
            }
            else {
                return response()->json(['responseText' => 'Error adding qualifications'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }

    public function getQualifications() {

        try {
            $qualification = $this->repo->listQualifications();

            if ($qualification) {
                return response()->json(['success'=> $qualification], 200);
            }
            else {
                return response()->json(['responseText' => 'Error retriving Qualifications'], 500);
            }
            
        } catch (QueryException $e) {
         return response()->json(['response' => $e->getMessage()], 500);
 
        }
    }
}
