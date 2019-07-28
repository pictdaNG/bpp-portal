<?php
namespace App\Repositories\AdvertLot;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\AdvertLot;
use App\BusinessCategory;
use Session;
use Illuminate\Support\Facades\Storage;


class EloquentAdvertLotRepository implements AdvertLotContract {
   
    public function createAdvertLot($request) {
        $advertLot = new AdvertLot;
        $this->setAdvertLotProperties($advertLot, $request);
        return $advertLot->save();
    }
    
    
    public function listAllAdvertLotsByStatus($status){
        //return Advert::where("status", $status)->get();
        return AdvertLot::all();
    }

    public function listAdvertLotsByUserId(){
        return Advert::where("user_id", Auth::user()->id)->get();  
    }

    public function listAllAdvertLots(){
        return AdvertLot::all();
    }

    public function listAdsByUserIdandCategory($categoryId){
        return AdvertLot::where("user_id", Auth::user()->id)
        ->where('advert_lot_business_category_id', $categoryId )
        ->get();
    }


    public function countAdvertsByCategory($categoryId){
        return AdvertLot::where('advert_lot_business_category_id', $categoryId )
        ->count();
    }


    public function removeAdvertLot($request) {
        try{
            $data = $request->aids;
            
            for($i=0; $i<sizeof($data); $i++){
                $tmp = AdvertLot::where('id', $data[$i] )->delete();
            }
            return true;
        } catch (\Exception $e) {
            return false;
       }
    }


    private function setAdvertLotProperties($advertLot, $request) {
        $user = Auth::user();
        $category =  BusinessCategory::where("id", $request->lot_category)->get();
        $projectName = $request->project_name !=null ? $request->project_name : '';
        $imageName = $request->advert_id.'.'.time().'.'.$request->tender_document->getClientOriginalExtension();
        $url = Storage::disk('s3')->put($imageName, fopen($request->tender_document, 'r+'), 'public');

        $advertLot->project_name = $projectName;
        $advertLot->project_status = $request->project_status;
        $advertLot->advert_id = $request->advert_id; 
        $advertLot->package_no = $request->package_no;
        $advertLot->lot_no = $request->lot_no;
        $advertLot->description = $request->description;
        $advertLot->advert_lot_business_category_id = $request->lot_category;  
        $advertLot->category_name = $category[0]->name;
        $advertLot->lot_amount = $request->lot_amount;
        $advertLot->tender_document = $url;  
        $advertLot->user_id = $user->id;

        

    }
    
}