<?php
namespace App\Repositories\Advert;
//namespace Carbon;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Advert;
use App\AdvertLot;
use Session;



class EloquentAdvertRepository implements AdvertContract {
   
    public function createAdvert($request) {
        $advert = new Advert;
        $this->setAdvertProperties($advert, $request);
        return $advert->save();
    }
    
    
    public function listAllAdvertsByStatus($status){
        //return Advert::where("status", $status)->get();
        return Advert::all();

    }


    public function getAdvertById($advertId) {
        return Advert::where("id", $advertId)->get()->first();
    }

    public function listAdvertsByUserId(){
        $data=  Advert::where("user_id", Auth::user()->id)->get();

        $ads = array();
            for($i=0; $i<sizeof($data); $i++){
                $lot = AdvertLot::where("advert_id", $data[$i]->id)->get();
                $obj = new \stdClass;
                $obj->id  =  $data[$i]->id;
                $obj->name  =  $data[$i]->name;            
                $obj->budget_year  =  $data[$i]->budget_year;
                $obj->advert_type  =  $data[$i]->advert_type;
                $obj->advert_mode  =  $data[$i]->advert_mode;
                $obj->introduction  =  $data[$i]->introduction;
                $obj->advert_publish_date  =  $data[$i]->advert_publish_date;
                $obj->bid_opening_date  =  $data[$i]->bid_opening_date;
                $obj->lots = sizeof($lot);
                $obj->user_id  =  $data[$i]->user_id;
                array_push($ads, $obj);

            }
        return $ads;
}

    public function listAllAdverts(){
        return Advert::all();
    }

    public function removeAdvert($request) {
        try{
            $data = $request->aids;
            
            for($i=0; $i<sizeof($data); $i++){
                $tmp = Advert::where('id', $data[$i] )->delete();
            }
            return true;
        } catch (\Exception $e) {
            return false;
       }
    }


    private function setAdvertProperties($advert, $request) {
        $user = Auth::user();
        //die($request->budget_year);
        $advert->name = $request->name;
        $advert->budget_year = $request->budget_year;
        $advert->advert_type = $request->advert_type; 
        $advert->advert_mode = $request->advert_mode;
        $advert->introduction = $request->introduction;
        $advert->advert_publish_date = Carbon::now()->isoFormat('M/D/YYYY');
        $advert->bid_opening_date = $request->bid_opening_date;  
        $advert->user_id = $user->id;

    }
    
}