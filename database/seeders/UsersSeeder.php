<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Phan Anh Minh',
                'date_birth' => '1994-04-10',
                'sex' => 'Nam',
                'address' => 'Hà Nội',
                'email' => 'phananhminh51202164@gmail.com',
                'password' => Hash::make('96e79218965eb72c92a549dd5a330112'),
                'type_employee' => 1,
                'branch' => 'Hồ Chí Minh',
                'phone' => '0946881949',
            ],
            [
                'name' => 'Phan Anh Sơn',
                'date_birth' => '1993-05-11',
                'sex' => 'Nam',
                'address' => 'Hà Nội',
                'email' => 'phananhson@email.com',
                'password' => Hash::make('d41d8cd98f00b204e9800998ecf8427e'),
                'type_employee' => 0,
                'branch' => 'Hồ Chí Minh',
                'license' => 'B2',
                'phone' => '0967676767',
            ],
            // Add more data rows here as needed
        ];

        DB::table('users')->insert($data);
    }
}
