<?php
namespace App\Repositories\PDFCertificateName;

interface PDFCertificateNameContract{

    public function find($id);
    
    public function listAllPDFName();
    
    public function create($request);
    
    public function update($id, $request);
    
    public function destroy($id);
}