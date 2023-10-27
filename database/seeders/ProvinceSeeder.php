<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Hà Nội'],
            ['name' => 'Bắc Ninh'],
            ['name' => 'Quảng Nam'],
            ['name' => 'Đà Nẵng'],
            ['name' => 'TP.Hồ Chí Minh'],
            ['name' => 'Bạc Liêu'],
            ['name' => 'Bảo Lộc'],
            ['name' => 'Lâm Đồng'],
        ];

        DB::table('province')->insert($data);
    }
}
