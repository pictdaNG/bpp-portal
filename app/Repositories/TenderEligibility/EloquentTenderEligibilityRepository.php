<?php
namespace App\Repositories\TenderEligibility;

use App\TenderEligibility;

class EloquentTenderEligibilityRepository implements TenderEligibilityContract
{
    public function create($requestData)
    {
       return TenderEligibility::create($requestData);
    }
    
    public function find($id)
    {
       return TenderEligibility::find($id);
    }
    
    
    public function listAllEligibility()
    {
        return TenderEligibility::all();
    }
    
    
    public function destroy($id)
    {
        $client = TenderEligibility::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return TenderEligibility::find($id)->update($requestData);
    }
    
}