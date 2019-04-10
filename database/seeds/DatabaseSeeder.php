<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserAdminSeeder::class);
        // $this->call(ContractorSeeder::class);
        $this->call(UserMDASeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(BusinessCategorySeeder::class);
        $this->call(BusinessSubCategory1Seeder::class);
        $this->call(BusinessSubCategory2Seeder::class);
    }
}
