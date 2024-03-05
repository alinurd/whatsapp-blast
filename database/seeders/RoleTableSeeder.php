<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */ 
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'title' => 'Administrator',
                'status' => 1,
                'permissions' => ['role','role-add', 'role-list', 'permission', 'permission-add', 'permission-list']
            ],
            [
                'name' => 'muzakki',
                'title' => 'Admin Input Muzakki',
                'status' => 1,
                'permissions' => []
            ],
            [
                'name' => 'mustahiq',
                'title' => 'Admin Input Mustahiq',
                'status' => 1,
                'permissions' => []
            ]
        ];

        foreach ($roles as $key => $value) {
            $permission = $value['permissions'];
            unset($value['permissions']);
            $role = Role::create($value);
            $role->givePermissionTo($permission);
        }
    }
}
