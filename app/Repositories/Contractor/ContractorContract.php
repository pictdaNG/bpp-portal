<?php

namespace App\Repositories\Contractor;

interface ContractorContract {
    public function createContractor($rquest);
    public function getUserById();
    public function getCompanyById();
}