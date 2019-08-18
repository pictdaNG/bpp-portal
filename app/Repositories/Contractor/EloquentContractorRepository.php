<?php

namespace App\Repositories\Contractor;

use App\Contractor;
use App\User;
use App\Repositories\Contractor\ContractorContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;


class EloquentContractorRepository implements ContractorContract{

    public function createContractor($request) {  
        $url = null;
        $contractor = new Contractor;
         $file = $request->profile_pic;
         $encoded_data = $request->profile_pic;
    
        if($file->getClientOriginalName() !=null) {
            $file = $request->profile_pic;
            $filenamewithoutext = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $filenamewithoutext.'_'.time().'.'.$extension;
            $directory = 'uploads/'.$filename;
            $uploaded = Storage::disk('s3')->put( $directory,  file_get_contents($file) , 'public');
            if($uploaded) {
                $url = Storage::disk('s3')->url($filename);
            }
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->profile_pic = $url;
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




