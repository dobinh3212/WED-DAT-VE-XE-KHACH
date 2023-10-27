<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    public function run()
    {
        DB::table('coach')->insert([
            [
                'license_plate' => '51H1-34215',
                'type_car_id' => 7,
                'number_seat' => 45,
                'is_active' => 1,
            ],
            [
                'license_plate' => '77A2-00011',
                'type_car_id' => 7,
                'number_seat' => 46,
                'is_active' => 1,
            ],
            [
                'license_plate' => '51H1-32012',
                'type_car_id' => 6,
                'number_seat' => 45,
                'is_active' => 0,
            ],
            [
                'license_plate' => '29H-123457',
                'type_car_id' => 6,
                'number_seat' => 45,
                'is_active' => 1,
            ],
            [
                'license_plate' => '29H-123456',
                'type_car_id' => 6,
                'number_seat' => 46,
                'is_active' => 0,
            ],
            // Add more data here
        ]);
    }
}
