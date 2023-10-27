<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact')->insert([
            [
                'name' => 'nguyen thanh nhan',
                'email' => '51202526@gmail.com',
                'phone' => '0989671651',
                'title' => 'testtesttestttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttest',
                'content' => 'test',
                'date_submit' => '2018-11-16 03:40:35',
                'is_checked' => 0,
            ],
            [
                'name' => 'Nguyen Thanh Nhan',
                'email' => 'nhan51202526@gmail.com',
                'phone' => '0989671651',
                'title' => 'test',
                'content' => 'tetstsdasd',
                'date_submit' => '2018-11-28 17:55:48',
                'is_checked' => 0,
            ],
            // Add more data here
        ]);
    }
}
