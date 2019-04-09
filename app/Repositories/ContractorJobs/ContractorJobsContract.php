<?php

namespace App\Repositories\ContractorJobs;

interface ContractorJobsContract {
    public function createJob($rquest);
    public function getJobsById();
}