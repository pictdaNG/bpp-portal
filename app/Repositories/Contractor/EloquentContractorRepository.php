<?php

namespace App\Repositories\Contractor;

use App\Contractor;
use App\User;
use App\Repositories\Contractor\ContractorContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorRepository implements ContractorContract{

    public function createContractor($request) {  
        $contractor = new Contractor;
        $search = Contractor::where('user_id', Auth::user()->id)->get()->first();

        if($search) {
            $this->setContractorProperties($search, $request);
            return $search->save();
        }
        else {
            $this->setContractorProperties($contractor, $request);
            return $contractor->save();

        }
    }


    public function getCompanyById(){
        return Contractor::where("user_id", Auth::user()->id)->first();

    }


    public function getUserById() {
        return User::where("id", Auth::user()->id)->first();
    }

    private function setContractorProperties($contractor, $request) {
          $user = Auth::user();
        $contractor->company_name = $user->name;
        $contractor->cac_number = $user->cac;
        $contractor->address = $request->address;
        $contractor->city =  $request->city;
        $contractor->country = $request->country;
        $contractor->email = $user->email;
        $contractor->user_id = $user->id;
        $contractor->website = $request->website; 

    }


//     private function setEditProperties($contractor, $request) {
//         $user = Auth::user();
//       $contractor->company_name = $user->name;
//       $contractor->cac_number = $user->cac;
//       $contractor->address = $request->address;
//       $contractor->city =  $request->city;
//       $contractor->country = $request->country;
//       $contractor->email = $user->email;
//       $contractor->user_id = $user->id;
//       $contractor->website = $request->website; 

//   }


}


?>