<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer')->insert([
            [
                'name' => 'Nguyễn Đặng Sỹ Luân',
                'date_birth' => '1995-12-09 00:00:00',
                'sex' => '1',
                'email' => 'syluanit@gmail.com',
                'password' => 'd41d8cd98f00b204e9800998ecf8427e',
                'phone' => '0963219951',
            ],
            [
                'name' => 'Dương Kim',
                'date_birth' => '1994-08-12 00:00:00',
                'sex' => '1',
                'email' => 'duongkim@gmail.com',
                'password' => '52c69e3a57331081823331c4e69d3f2e',
                'phone' => '0322336512',
            ],
            [
                'name' => 'Dương Lan',
                'date_birth' => '1992-05-12 00:00:00',
                'sex' => '2',
                'email' => 'duonglan@gmail.com',
                'password' => '52c69e3a57331081823331c4e69d3f2e',
                'phone' => '0969315468',
            ],
            // Add more data here
        ]);
    }
}
