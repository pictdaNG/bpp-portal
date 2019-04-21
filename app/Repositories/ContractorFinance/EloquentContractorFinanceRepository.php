<?php
namespace App\Repositories\ContractorFinance;

use App\ContractorFinance;
use App\User;
use App\Repositories\ContractorFinance\ContractorFinanceContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorFinanceRepository implements ContractorFinanceContract{

    public function createFinance($request) { 
        $contractorFinance = new ContractorFinance;
        $this->setContractorFinanceProperties($contractorFinance, $request);
        return $contractorFinance->save();
    }

    public function getFinancesById() {
        return ContractorFinance::where("user_id", Auth::user()->id)->get();
    }

    public function removeFinance($request) {
        $data = $request['fids'];
        try {
            for($i=0; $i<sizeof($data); $i++){
                $tmp = ContractorFinance::find($data[$i]);
                $tmp->delete();
           }
           return true;
        }
        catch(\Exception $e){
            return false;
        }
    }

    private function setContractorFinanceProperties($finance, $request) {
        $user = Auth::user();
        $finance->turn_over = $request->turn_over;
        $finance->total_asset = $request->total_asset;
        $finance->total_liability = $request->total_liability; 
        $finance->witholding_tax= $request->witholding_tax;
        $finance->tax_paid = $request->tax_paid;
        $finance->tcc_no = $request->tcc_no;
        $finance->audit_firm = $request->audit_firm;
        $finance->report_date = $request->report_date;
        $finance->year = $request->year;  
        $finance->user_id = $user->id;

    }

}

?>
