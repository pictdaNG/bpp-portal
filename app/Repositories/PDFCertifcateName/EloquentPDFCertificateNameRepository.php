<?php
namespace App\Repositories\PDFCertificateName;

use App\PDFCertificateName;

class EloquentPDFCertificateNameRepository implements PDFCertificateNameContract
{
    public function create($requestData)
    {
       return PDFCertificateName::create($requestData);
    }
    
    public function find($id)
    {
       return PDFCertificateName::find($id);
    }
    
    
    public function listAllPDFName()
    {
        return PDFCertificateName::all();
    }
    
    
    public function destroy($request){     

        $data = $request->nids;
        for($i = 0; $i < sizeof($data); $i++ ){
         $client = PDFCertificateName::where('id', $data[$i])->delete();
        }
        return $client;
     
    }
    
    public function update($id, $requestData)
    {
       return PDFCertificateName::find($id)->update($requestData);
    }
    
}