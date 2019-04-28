<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Exception;

use App\Repositories\Sales\SalesContract;
use Illuminate\Support\Facades\Auth;
use App\User;
use PDF;



class SalesController extends Controller{
    protected $repo;

    public function __construct(SalesContract $salesContract){
        // $this->middleware('auth');
        $this->repo = $salesContract;
    }


    public function storeSales(Request $request) {

        try {
            $data = (object)$request->all();
            $sales = $this->repo->create($data);

            if ($sales) {

                return redirect()->route('purchases', $sales)->with('success', 'Sales Added Succesfully.');
            }
            else {
                return redirect()->back()->with('error', 'Failed to Purchase.');
            }
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to Purchase.');
 
        }
    }

    public function getSalesByUserId() {

        try {
            $sales = $this->repo->listSalesByUserId();

            if ($sales) {
                return response()->json(['success'=> $qualification], 200);
            }
            else {
                return redirect()->back()->with('error', 'Failed to Purchase.');
            }
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to Purchase.');
 
        }
    }

    public function delete($id){
        try {
        
            $sales = $this->repo->destroy($id);

            if ($sales) {
                
                 return back()->with(['success'=>'sales deleted Succesfully.']);
            }
            else {
                return back()->with(['responseText' => 'Error adding Company Ownership']);
            }
            
        } catch (Exception $e) {
            return back()->with(['responseText' => 'Error adding Company Ownership']);
 
        }
        
    }

    public function getSalesByUserandAdvert($advertId) {
          $sales =  $this->repo->listSalesByUserandAdvertId($advertId);
        return view('contractor.purchasedBids', ['sales' => $sales]);
    }


    public function downloadPDF( ){
        $user = User::where('id', Auth::user()->id)->get()->first();
        $pdf = PDF::loadView('contractor/PurchasedBidPDF', compact('user'));
        return $pdf->download('tender.pdf');
      }

    public function getTransactions() {
        $transactions = $this->repo->getTransactions();
        // dd($transactions);
        return view('mda.transactions', ['transactions' => $transactions]);
    }


    public function updatePaymentStatus($id) {
        $this->repo->updatePaymentStatus($id);
        return back();
    }

}
