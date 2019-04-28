<?php
namespace App\Repositories\Sales;

use App\sales;
use App\AdvertLot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EloquentSalesRepository implements SalesContract
{
    public function create($request){

        $data = $request->fids;
        $user = Auth::user();
        for( $i = 0; $i<sizeof($data); $i++) {
            $lot = AdvertLot::where('id', $data[$i])->first();
            $sales = new Sales;
            $sales->advert_lot_id =  $data[$i];
            $sales->lot_description = $lot->description;
            $sales->advert_id = $lot->advert_id;
            $sales->amount = $lot->lot_amount;
            $sales->advert_name = $request->advert_name;
            $sales->advert_introduction = $request->advert_introduction;
            $sales->mda_id = $request->mda_id;
            $sales->mda_name = $request->mda_name;
            $sales->user_id = $user->id;
            $sales->user_name = $user->name;
            $sales->payment_status = 'pending';
            $sales->transaction_id = (rand(1, 10000).rand(1, 10000));
            $sales->save();
        }
        return $sales->advert_id;
    }
    
    public function find($id)
    {
       return sales::find($id);
    }
    
    
    public function listSales()
    {
        return sales::all();
    }

    public function listSalesByUserId()
    {
        return sales::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function listSalesByUserandAdvertId($advertId){
        return sales::where('advert_id', $advertId)
            ->where('user_id', Auth::user()->id)
             ->orderBy('created_at', 'desc')->get();
    }
    
    public function getTransactions() {
        return sales::where('mda_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function mySales() {
        return sales::where('mda_id', Auth::user()->id)
       ->where('payment_status', 'paid')
       ->sum('amount');
    }


    public function totalSales() {
        return sales::all()->count();
    }

    public function salesCount(){
        return sales::where('mda_id', Auth::user()->id)->count();
    }

    public function submittedApplications(){
         return sales::where('mda_id', Auth::user()->id)
         ->distinct('advert_lot_id')
         ->count('advert_lot_id');

    }

    public function getSubmittionsByMDA(){
        return Sales::where('mda_id', Auth::user()->id)->
        orderBy('created_at', 'desc')->get();
    }
    
    public function destroy($id)
    {
        $client = Sales::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
        return Sales::find($id)->update($requestData);
    }

    public function updatePaymentStatus($id) {
        $payment = Sales::where('id', $id)->firstOrFail();
        $payment->payment_date = Carbon::now()->isoFormat('YYYY-MM-DD HH:mm:ss');
        if ($payment->payment_status == 'Paid') {
            $payment->payment_status = 'Pending';
        }
        else {
            $payment->payment_status = 'Paid';
        }
        return $payment->save();
    }
    
}