<?php
namespace App\Repositories\Qualifications;

use App\Qualification;

class EloquentQualificationRepository implements QualificationContract
{
    public function create($requestData)
    {
       return Qualification::create($requestData);
    }
    
    public function find($id)
    {
       return Qualification::find($id);
    }
    
    
    public function listQualifications()
    {
        return Qualification::all();
    }
    
    
    public function destroy($id)
    {
        $client = Qualification::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Qualification::find($id)->update($requestData);
    }
    
}