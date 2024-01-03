<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Customer',
        ];

        foreach($roles as $role) {
            $newRole = \App\Models\Role::create([
                'name' => $role,
            ]);

            if ($newRole->id === 1) {
                for($i = 1; $i <= 21; $i++) {
                    $permission = Permission::findOrFail($i);
                    $newRole->permissions()->attach($permission);
                }
            } elseif ($newRole->id === 2) {
                $ids = [1, 2, 4, 5, 13, 14, 16, 17, 19, 20];
                foreach($ids as $id) {
                    $permission = Permission::findOrFail($id);
                    $newRole->permissions()->attach($permission);
                }
            }
        }
    }
}
