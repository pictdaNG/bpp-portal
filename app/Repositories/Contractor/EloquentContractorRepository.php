<?php

namespace App\Repositories\Contractor;

use App\Contractor;
use App\User;
use App\Repositories\Contractor\ContractorContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class EloquentContractorRepository implements ContractorContract{

    public function createContractor($request) {  
        $contractor = new Contractor;
       //    dd($request);
        $file = $request->profile_pic;
        $filename = $file->getClientOriginalName();
        $destinationPath = 'uploads/';

       // $request->profile_pic = $filename; 
        $file->move($destinationPath, $filename);

        $user = User::where('id', Auth::user()->id)->first();
        $user->profile_pic = $filename;
        $user->password = $request->password_update;
        $user->save();

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
        return Contractor::where('user_id', Auth::user()->id)->first();

    }

    public function find($id){
       return Contractor::where('user_id', $id)
       ->with('user')
       ->first();
    }


    public function getUserById() {
        return User::where('id', Auth::user()->id)->first();
    }

    public function editPassword($request) {
        $user = User::where('id', Auth::user()->id)->first();
       // dd($user);
       
        if(!Hash::check($request->password, $user->password )) {
            return 'Current Password donot Match!';
        }
        else if($request->new_password != $request->confirm_password){
            return 'New Passwords donot Match';
        } 
        $user->password = bcrypt($request->new_password);
        $user->save();
        return 1;
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
}


?>