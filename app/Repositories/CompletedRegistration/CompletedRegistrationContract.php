<?php
namespace App\Repositories\CompletedRegistration;

interface CompletedRegistrationContract       
{
  //  public function find($id);
    
  //  public function listCompanyOwnership();
    
    public function create($request);

    public function getRegistrationsByUserId();

    public function getRegistrationsById($id);

    
   // public function update($id, $requestData);
    
   // public function destroy($id);
}

