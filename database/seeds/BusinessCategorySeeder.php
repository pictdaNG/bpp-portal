<?php

use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_categories')->insert([[
            'name' => 'Constructions | Works',
        ]]);
        DB::table('business_categories')->insert([[
            'name' => 'Consultancy | Services',
        ]]);
        DB::table('business_categories')->insert([[
            'name' => 'Goods | Supply',
        ]]);
    }
}
