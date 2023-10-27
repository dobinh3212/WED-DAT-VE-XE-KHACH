<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongKeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Tháng' => 1,
                'Năm' => 2017,
                'Số_chuyến_xe' => 10,
                'Chi_phí' => 50000000,
                'Doanh_thu' => 70000000,
                'created__at' => '2018-10-11 18:04:29',
            ],
            // Add more data rows here as needed
        ];

        DB::table('thong_ke')->insert($data);
    }
}
