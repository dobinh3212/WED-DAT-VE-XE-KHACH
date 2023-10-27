<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_ticket')->insert([
            [
                'user_edit_id' => 1,
                'customer_id' => 14,
                'buse_id' => 22,
                'number' => 1,
                'is_active' => 2,
                'total' => '225000',
                'created_at' => '2018-12-12 15:25:58',
                'updated_at' => '2018-12-13 19:32:59',
            ],
            [
                'user_edit_id' => 1,
                'customer_id' => 28,
                'buse_id' => 22,
                'number' => 2,
                'is_active' => 2,
                'total' => '450000',
                'created_at' => '2018-12-12 05:05:29',
                'updated_at' => '2018-12-13 19:31:26',
            ],
            // Add more data for other records here...
        ]);
    }
}

