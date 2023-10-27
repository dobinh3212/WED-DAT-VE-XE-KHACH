<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntroduceSeeder extends Seeder
{
    public function run()
    {
        DB::table('introduce')->insert([
            [
                'content' => '<p>CÔNG TY CỔ PHẦN ABC tsdasdhsadkasdhlsakdksaldklsh</p>\r \r <p>dsad</p>\r \r <p>sadsadasd</p>\r \r <p>s</p>\r \r <p>d&aacute;</p>\r \r <p>dsdas</p>\r \r <p>dsa</p>\r \r <p>s</p>\r \r <p>d</p>\r \r <p>đ</p>',
                'user_id_create' => 1, // Replace with the actual user ID
                'user_id_update' => 1, // Replace with the actual user ID
            ],
            // Add more data here
        ]);
    }
}
