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
                'nama' => 'Admin',
                'username' => 'systemadmin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
            ],
            [
                'nama' => 'Admin',
                'username' => 'demoadmin',
                'email' => 'demo@example.com',
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
            ],
            [
                'nama' => 'User',
                'username' => 'user',
                'email' => 'user@example.com', 
                'password' => bcrypt('password'),
                'nomor_telp' => '+12398190255',
                'alamat' => 'pamulang',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'inactive'
            ]
        ];
        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole($value['user_type']);
        }
    }
}
