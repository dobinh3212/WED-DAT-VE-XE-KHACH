<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'company' => 'Công ty abc',
                'address' => 'Thạch Thất - Hà Nội',
                'address2' => 'Thạch Thất - Hà Nội',
                'phone' => '0372 471 772',
                'hotline' => '0372471772',
                'tax' => '12345678',
                'facebook' => 'https://www.facebook.com/byt3212/',
                'email' => 'dovanbinh@gmail.com',
                'created_at' => '2022-04-06 20:43:06',
            ],
            // Add more data rows here as needed
        ];

        DB::table('settings')->insert($data);
    }
}
