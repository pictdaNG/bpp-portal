<?php

use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Admin',
            'email' => 'admin@logicaladdress.com',
            'user_type' => 'admin',
            'phone' => '08161730129',
            'password' => bcrypt('faker00tX'),
        ],
        [
            'name' => 'PICTDA',
            'email' => 'pictda@gmail.com',
            'user_type' => 'mda',
            'phone' => '08161730129',
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'Facebook Nigeria',
            'email' => 'facebook@gmail.com',
            'user_type' => 'contractor',
            'phone' => '08161730129',
            'password' => bcrypt('password'),
        ]]);
    }
}
