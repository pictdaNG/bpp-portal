<?php

use Illuminate\Database\Seeder;

class UserMDASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'MDA',
            'email' => 'mda@logicaladdress.com',
            'user_type' => 'mda',
            'phone' => '08161730129',
            'password' => bcrypt('faker00tX'),
            'bank_name' => "KEYSTONE BANK",
            'bank_account_no' => '2568889952',
            'split_percentage' => 8,
        ]]);
    }
}
