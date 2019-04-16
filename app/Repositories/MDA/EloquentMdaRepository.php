<?php
namespace App\Repositories\MDA;

use App\Mda;

class EloquentMdaRepository implements MdaContract
{
    public function create($requestData)
    {
       return Mda::create($requestData);
    }
    
    public function find($id)
    {
       return Mda::find($id);
    }
    
    
    public function listMdas()
    {
        return Mda::all();
    }
    
    
    public function destroy($id)
    {
        $client = Mda::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Mda::find($id)->update($requestData);
    }

    public function removeMda($request){ 
        try {
           dd($request);
            // $data = $request['cates'];
            // for($i=0; $i<sizeof($data); $i++){
            //     $tmp = Mda::find($data[$i]);
            //     $tmp->delete();
                
            // }
            return true;

        }
        catch(\Exception $e){
            dd($e->getMessage());
            return false;
        } 
    }
    
}