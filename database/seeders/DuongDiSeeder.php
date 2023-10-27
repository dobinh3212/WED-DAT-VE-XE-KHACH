<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuongDiSeeder extends Seeder
{
    public function run()
    {
        DB::table('duong_di')->insert([
            [
                'Mã_Trạm_Start' => 1,
                'Mã_Trạm_End' => 2,
                'Tọa_độ_detail' => 'Coordinates for route 1',
            ],
            [
                'Mã_Trạm_Start' => 2,
                'Mã_Trạm_End' => 3,
                'Tọa_độ_detail' => 'Coordinates for route 2',
            ],
            // Add more data here
        ]);
    }
}
