<?php
namespace App\Repositories\Sales;

interface SalesContract       
{
    public function find($id);
    
    public function listSales();
    
    public function create($requestData);

    public function listSalesByUserId();
    
    public function update($id, $requestData);
    
    public function destroy($id);

    public function listSalesByUserandAdvertId($advertId);

    public function mySales();

    public function totalSales();

    public function salesCount();

    public function getSubmittionsByMDA();

    public function submittedApplications();

    public function getTransactions();

    public function updatePaymentStatus($id);
}