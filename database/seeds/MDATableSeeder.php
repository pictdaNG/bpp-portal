<?php

use Illuminate\Database\Seeder;

class MDATableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mdas')->insert([[
            'name' => 'The Federal Politechnic Nasarawa',
            'mda_code' => '378273',
            'category' => 'Economic Sector',
            'email' => 'Economic Sector',
        ]]);
    }
}
