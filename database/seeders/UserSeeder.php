<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'userID' => 'Adm2502541',
                'name' => 'Tes Admin',
                'alamat' => 'Jalan Hasyim Asyari 252 Jakarta',
                'no_sim' => '123456789012',
                'no_telp' => '123456789012345',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin1234567'),
                'status' => 'Admin',
            ],
            [
                'userID' => 'Usr2502541',
                'name' => 'Tes User',
                'alamat' => 'Jalan Hasyim Asyari 252 Jakarta',
                'no_sim' => '123456789012',
                'no_telp' => '123456789012345',
                'email' => 'user@admin.com',
                'password' => bcrypt('user1234567'),
                'status' => 'Users',
            ],
        ];

        foreach ($data as $key=>$value){
            User::create($value);
        }

    }
}
