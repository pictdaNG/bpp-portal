<?php
namespace App\Repositories\Advert;
//namespace Carbon;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Advert;
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

    public function listAdvertsByUserId(){
        return Advert::where("user_id", Auth::user()->id)->get();
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