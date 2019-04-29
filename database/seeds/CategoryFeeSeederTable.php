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
            'name' => 'Small Works',
            'description' => 'small jobs between 1.0 to 10 million',
            'amount' => '10000',
            'renewal_fee' => '5000',
           
        ],
        [
            'name' => 'Small Works',
            'description' => 'jobs above 10 million less than  50 million',
            'amount' => '30000',
            'renewal_fee' => '10000',
       
        ],
        [
            'name' => 'Medium Works',
            'description' => 'jobs above 50 million less than  100 million',
            'amount' => '40000',
            'renewal_fee' => '20000',
        ],
        [
            'name' => 'Medium Works',
            'description' => 'jobs above 100 million less than  250 million',
            'amount' => '60000',
            'renewal_fee' => '25000',
        ],
        [
            'name' => 'Medium Works',
            'description' => 'jobs above 250 million less than  500 million',
            'amount' => '70000',
            'renewal_fee' => '30000',
        ],
        [
            'name' => 'Large Works',
            'description' => 'jobs above 500 million less than  1 billion',
            'amount' => '100000',
            'renewal_fee' => '40000',
        ],

        [
            'name' => 'Large Works',
            'description' => '1 billion and above',
            'amount' => '120000',
            'renewal_fee' => '50000',
        ],

        [
            'name' => 'Consultancy',
            'description' => 'Consultancy',
            'amount' => '60000',
            'renewal_fee' => '25000',
        ],
        ]);
    }
}
