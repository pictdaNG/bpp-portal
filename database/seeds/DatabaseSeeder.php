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
        $this->call(UserMDASeeder::class);
       //eddie....
    //    $this->call(OwnershipTableDataSeeder::class);
    //    $this->call(CountrySeeder::class);
       $this->call(OwnershipTableDataSeeder::class);
       $this->call(CountrySeeder::class);

        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(BusinessCategorySeeder::class);
        $this->call(BusinessSubCategory1Seeder::class);
        $this->call(BusinessSubCategory2Seeder::class);
        $this->call(EmploymentTypeSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(CompanyOwnershipSeeder::class);
        $this->call(QualificationSeeder::class);



    }
}
