<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void 
     */
    public function run()
    {
        $users = [
            [
                'nama_lengkap' => 'Admin',
                'username' => 'systemadmin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
                'role' => 1,
            ],
            [
                'nama_lengkap' => 'Muzaki',
                'username' => 'demoadmin', 
                'email' => 'muzaki@example.com',
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'role' => 2,
            ],
            [
                'nama_lengkap' => 'User',
                'username' => 'user',
                'email' => 'mustaki@example.com', 
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'inactive',
                'role' => 3,

            ]
        ];
        foreach ($users as $key => $value) {
            $user = User::create($value);
             $user->assignRole($value['user_type']);
        }
    }
}
