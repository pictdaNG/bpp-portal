<?php

namespace App\Repositories\TenderRequirement;

interface TenderRequirementContract {
    public function createTenderRequirement($request);
    public function listRequirementsByLotId($lotId);
    //public function removeDirector($request);
}