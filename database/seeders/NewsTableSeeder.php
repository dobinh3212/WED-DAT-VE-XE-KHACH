<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Hồ Gươm, một trong những biểu tượng của Hà Nội',
                'image' => 'hanoi_du_lich_1649684868.jpg',
                'introduce' => 'Bắt đầu từ 0h ngày 11/2/2017...',
                'content' => '<p>Các tỉnh này gồm Sơn La, Lai Châu, ...</p>',
                'check_slide' => 1,
                'created_at' => '2022-05-01 09:10:29',
                'updated_at' => '2022-04-12 12:55:35',
            ],
            // Add more records as needed
        ]);
    }
}
