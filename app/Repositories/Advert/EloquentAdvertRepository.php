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
         if($request->budget_year > date("Y")) {
            return 'Invalid Budget Year';
        }
        else if(Carbon::parse($request->bid_opening_date)->isoFormat('DD-MM-YYYY') <= Carbon::now()->isoFormat('DD-MM-YYYY')){
            return 'Invalid Closing Date';
        }
       
         $advert->save();
         return 1;
    }

    public function editAdvert($request) {
       // dd($request);
        $advert = Advert::find($request->id);
        $advert->tender_collection = $request->tender_collection;
        $advert->tender_submission = $request->tender_submission;
        $advert->tender_opening = $request->tender_opening;
        return $advert->save();
    }
    

    public function listActiveAdverts(){
        return Advert::with('user')
        ->where("bid_opening_date", ">", Carbon::now()->isoFormat('DD-MM-YYYY'))
        ->where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function listAllAdvertsForContractor(){
        return Advert::with('user')
      //  ->where('status',  'active')
        ->orderBy('created_at', 'desc')
        ->get();;
    }


    public function listAdvertsByMDA(){
        return Advert::where('user_id', Auth::user()->id)
            ->with('advertLot.tenderRequirement')
            ->with('advertLot')
            ->orderBy('created_at', 'DESC')
            ->get();

    }

    public function getAdsById($id){
        return Advert::where('id', $id)
            ->with('advertLot.tenderRequirement')
            ->with('advertLot')
            ->with('tenderRequirement')
            ->with('user')
            ->get()->first();

    }

    public function getAdsByCatId($id){
     $records =  AdvertLot::where('advert_lot_business_category_id', $id)
        ->with('advert')
        ->with('user')
        ->with('advert.tenderRequirement')
        ->orderBy('created_at', 'desc')
        ->get();

        $ads = array();
            foreach($records as $data){
                $status = $data->advert->bid_opening_date > Carbon::now()->isoFormat('DD-MM-YYYY') ? 'text-success-dk' :'text-danger-dk';
                $route = $status=='text-success-dk' ?  'AdvertController@getAdvertById' : 'AdvertController@getAdvertById';
                $obj = new \stdClass;
                $obj->lot_id  =  $data->id;
                $obj->advert_id  =  $data->advert->id;
                $obj->description  =  $data->description;
                $obj->lot_amount  =  $data->lot_amount;
                $obj->tender_document  =  $data->tender_document;
                $obj->document_type  =  mime_content_type('uploads/'.$data->tender_document);
                $obj->bid_opening_date  =  $data->advert->bid_opening_date;
                $obj->mda_name  =  $data->user->name;
                $obj->category_name = $data->category_name;
                $obj->status = $status;
                $obj->route = $route;

                if($data->advert->status=='active') {
                    array_push($ads, $obj);
                }
              

            }
        return $ads;

    }

    public function closingBids(){    
        $from =  Carbon::now()->isoFormat('DD-MM-YYYY');
        $to = Carbon::now() ->addDays(7)->isoFormat('DD-MM-YYYY');
        return Advert::whereBetween('bid_opening_date', [$from, $to])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

    }

    

    public function getAdvertById($advertId) {
        return Advert::with('tenderRequirement')->where("id", $advertId)->get()->first();
    }

    public function listAdvertsByUserId(){
        $data=  Advert::where("user_id", Auth::user()->id)->orderBy('created_at', 'DESC')->get();

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
        return Advert::with('user')
        ->orderBy('created_at', 'desc')
        ->get();;
    }


    public function listApprovedAdverts(){
        return Advert::with('user')
        ->where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->get();;
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

    public function updateAdvertStatus($advertId, $status){
        $advert = Advert::find($advertId);
        $advert->status = $status;
        return $advert->save();
    }


    private function setAdvertProperties($advert, $request) {
        $user = Auth::user();
        $bid_opening_date = Carbon::parse($request->bid_opening_date);
        $advert->name = $request->name;
        $advert->budget_year = $request->budget_year;
        $advert->advert_type = $request->advert_type; 
        $advert->advert_mode = $request->advert_mode;
        $advert->introduction = $request->introduction;
        $advert->advert_publish_date = Carbon::now()->isoFormat('DD-MM-YYYY');
        $advert->bid_opening_date = $bid_opening_date->isoFormat('DD-MM-YYYY');  
        $advert->status = 'pending';
        $advert->user_id = $user->id;

    }
    
}