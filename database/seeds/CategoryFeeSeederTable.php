<?php

use Illuminate\Database\Seeder;

class CategoryFeeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_registration_fees')->insert([[
            'name' => 'Electrical | Mechanical Engineering',
            'amount' => '5000',
           
        ],
        [
            'name' => 'Building | Construction',
            'amount' => '6000',
       
        ],
        [
            'name' => 'Good | Supply',
            'amount' => '7000',
        ]]);
    }
}
