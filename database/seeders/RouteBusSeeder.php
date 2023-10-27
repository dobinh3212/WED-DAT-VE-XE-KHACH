<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteBusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_create' => '1',
                'user_update' => '1',
                'departure' => 'Hà Nội',
                'destination' => 'Hà Nội',
                'rest_stops' => '1',
                'time_intend' => 3,
                'km' => '280',
                'image' => 'ho_chi_minh_1649769958.jpeg',
                'route' => 'Hà Nội - Hà Nội',
                'hot' => '1',
            ],
            // Add more data rows here as needed
        ];

        DB::table('route_bus')->insert($data);
    }
}
