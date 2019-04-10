<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Director\DirectorContract;



class DirectorController extends Controller{
    protected $repo;
    public function __construct(DirectorContract $directorContract){
        $this->middleware('auth');
        $this->repo = $directorContract;
    }
    
    public function directors(){
        $directors = $this->repo->getCompanyDirectors();
        return response()->json(['directors'=> $directors], 200);
    }

    public function storeDirector(Request $request) {
       try {
           $director = $this->repo->createDirector((object)$request->all());
             
           if ($director) {
               return response()->json(['success'=>'Added new records.'], 200);
               
            } else {
            
                return response()->json(['responseText' => $e->getMessage()], 500);
            }
       } catch (QueryException $e) {
        return response()->json(['response' => $e->getMessage()], 500);
       }
    }
}
