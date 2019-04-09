<?php

namespace App\Repositories\Director;

use App\Director;
use App\User;
use App\Repositories\Director\DirectorContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentDirectorRepository implements DirectorContract{

    public function createDirector($request) {  
        $director = new Director;
        $this->setDirectorProperties($director, $request);
        return $director->save();
    }


    public function getCompanyDirectors() {
        return Director::where("user_id", Auth::user()->id)->get();
    }

    private function setDirectorProperties($director, $request) {
          //$user = Auth::user();
          //dd($request);
        $director->first_name = $request->first_name;
        $director->last_name = $request->last_name;
        $director->gender= $request->gender;
        $director->nationality = $request->nationality;
        $director->country = $request->country;
        $director->identification = $request->identification;
        $director->membership_id_no = $request->membership_id_no;
        $director->professional_membership = $request->professional_membership;
        $director->user_id = Auth::user()->id;


    }


}


?>