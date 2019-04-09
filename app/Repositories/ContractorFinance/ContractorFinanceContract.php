<?php

namespace App\Repositories\ContractorFinance;

interface ContractorFinanceContract {
    public function createFinance($rquest);
    public function getFinancesById();
}