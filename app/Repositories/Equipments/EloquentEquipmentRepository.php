<?php
namespace App\Repositories\Equipments;

use App\Equipments;

class EloquentEquipmentRepository implements EquipmentContract
{
    public function create($requestData)
    {
       return Equipments::create($requestData);
    }
    
    public function find($id)
    {
       return Equipments::find($id);
    }
    
    
    public function listOwnershipStructure()
    {
        return Equipments::all();
    }
    
    
    public function destroy($id)
    {
        $client = Equipments::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Equipments::find($id)->update($requestData);
    }
    
}