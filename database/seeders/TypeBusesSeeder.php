<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeBusesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type_bus' => 'Xe ghế ngồi',
                'seats' => 47,
                'number_row' => 12,
                'number_columns' => 6,
                'diagram' => '100000110011110011110011110011110011110011110011110011110011110011111111',
                'user_create' => '1',
                'user_update' => 'Đỗ Văn Bình',
            ],
            [
                'type_bus' => 'Xe giường nằm',
                'seats' => 41,
                'number_row' => 13,
                'number_columns' => 5,
                'diagram' => '10000101011010110101101011010111111101011010110101101011010111111',
                'user_create' => '1',
                'user_update' => '1',
            ],
            // Add more data rows here as needed
        ];

        DB::table('type_buses')->insert($data);
    }
}
