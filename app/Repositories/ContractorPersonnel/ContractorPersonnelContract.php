<?php

namespace App\Repositories\ContractorPersonnel;

interface ContractorPersonnelContract {
    public function createPersonnel($rquest);
    public function getPersonnelsById();
}