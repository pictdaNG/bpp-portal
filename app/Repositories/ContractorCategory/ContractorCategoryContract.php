<?php

namespace App\Repositories\ContractorCategory;

interface ContractorCategoryContract {
    public function createCategory($rquest);
    public function getCategoriesById();
}