<?php

namespace App\Repositories\ContractorMachinery;

use App\ContractorMachinery;
use App\User;
use App\Repositories\ContractorMachinery\ContractorMachineryContract;
use Illuminate\Support\Facades\Auth;
use Session;


class EloquentContractorMachineryRepository implements ContractorMachineryContract{

    public function createMachinery($request) { 
        $machinery = new ContractorMachinery;
        $this->setContractorJobsProperties($machinery, $request);
        return $machinery->save();
    }

    public function getMachineriesById() {
        return ContractorMachinery::where("user_id", Auth::user()->id)->get();
    }

    public function removeMachinery($request){ 
        $data = $request['mids'];
       try {
            for($i=0; $i<sizeof($data); $i++){
                 $tmp = ContractorMachinery::find($data[$i]);
                 $tmp->delete();
             }
           return true;
       }
       catch(\Exception $e){
           return false;
       }
    }

    private function setContractorJobsProperties($machine, $request) {
        $user = Auth::user();
        $machine->equipment_type = $request->equipment_type;
        $machine->specifics = $request->specifics;
        $machine->acquisition_date = $request->acquisition_date; 
        $machine->cost= $request->cost;
        $machine->location = $request->location;
        $machine->serial_no = $request->serial_no;
        $machine->equipment_status = $request->equipment_status;  
        $machine->user_id = $user->id;

    }

}

?>
