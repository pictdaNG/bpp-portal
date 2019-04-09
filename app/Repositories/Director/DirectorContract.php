<?php

namespace App\Repositories\Director;

interface DirectorContract {
    public function createDirector($request);
    public function getCompanyDirectors();
}