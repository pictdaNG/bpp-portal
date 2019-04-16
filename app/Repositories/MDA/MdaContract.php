<?php
namespace App\Repositories\MDA;

interface MdaContract      
{
    public function find($id);
    
    public function listMdas();
    
    public function create($requestData);
    
    public function update($id, $requestData);
    
    public function destroy($id);

    public function removeMda($request);
}