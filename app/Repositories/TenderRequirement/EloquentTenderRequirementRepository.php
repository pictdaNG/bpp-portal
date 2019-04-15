<?php

namespace App\Repositories\TenderRequirement;

use App\TenderRequirement;
use App\User;
use App\AdvertLot;
use App\Repositories\TenderRequirement\TenderRequirementContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentTenderRequirementRepository implements TenderRequirementContract{

    public function createTenderRequirement($request) {  
        $result;
        for($i=0; $i < sizeof($request->requirement); $i++){
            $requirement = new TenderRequirement;
            $this->setTenderRequirementProperties($requirement, $request, $i);
             $result = $requirement->save();
        }
         return $result;
    }


    public function listRequirementsByLotId($lotId) {
        return TenderRequirement::where("lot_id", $lotId)->get();
    }

    private function setTenderRequirementProperties($requirement, $request, $index) {
          $user = Auth::user();
          $advert = AdvertLot::where("advert_id", $request->advertId )->get();
        $requirement->name = $request->requirement[$index];
        $requirement->lot_id = $advert[0]->id;
        $requirement->lot_no= $advert[0]->lot_no;
        $requirement->advert_id = $request->advertId;
        $requirement->project_name = $advert[0]->project_name;
        $requirement->user_id = Auth::user()->id;


    }


}


?>