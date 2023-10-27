<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusStopSeeder extends Seeder
{
    public function run()
    {
        DB::table('bus_stop')->insert([
            [
                'name' => 'Trường Đại Học Ngân Hàng',
                'position' => '10.860252,106.761847',
                'user_create' => '1',
                'user_update' => 'Đỗ Văn Bình',
            ],
            [
                'name' => 'Trạm dừng 1',
                'position' => '10.863760207175778,106.7552897195435',
                'user_create' => '1',
                'user_update' => '1',
            ],
            // Add more data here
        ]);
    }
}
