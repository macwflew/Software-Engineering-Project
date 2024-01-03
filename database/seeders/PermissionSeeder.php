<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [ 'name' => 'Create Event', 'slug' => 'create-event' ],
            [ 'name' => 'Update Event', 'slug' => 'update-event' ],
            [ 'name' => 'Delete Event', 'slug' => 'delete-event' ],
            [ 'name' => 'Create Item', 'slug' => 'create-item' ],
            [ 'name' => 'Update Item', 'slug' => 'update-item' ],
            [ 'name' => 'Delete Item', 'slug' => 'delete-item' ],
            [ 'name' => 'Create Permission', 'slug' => 'create-permission' ],
            [ 'name' => 'Update Permission', 'slug' => 'update-permission' ],
            [ 'name' => 'Delete Permission', 'slug' => 'delete-permission' ],
            [ 'name' => 'Create Role', 'slug' => 'create-role' ],
            [ 'name' => 'Update Role', 'slug' => 'update-role' ],
            [ 'name' => 'Delete Role', 'slug' => 'delete-role' ],
            [ 'name' => 'Create Team', 'slug' => 'create-team' ],
            [ 'name' => 'Update Team', 'slug' => 'update-team' ],
            [ 'name' => 'Delete Team', 'slug' => 'delete-team' ],
            [ 'name' => 'Create Textbook', 'slug' => 'create-textbook' ],
            [ 'name' => 'Update Textbook', 'slug' => 'update-textbook' ],
            [ 'name' => 'Delete Textbook', 'slug' => 'delete-textbook' ],
            [ 'name' => 'Create User', 'slug' => 'create-user' ],
            [ 'name' => 'Update User', 'slug' => 'update-user' ],
            [ 'name' => 'Delete User', 'slug' => 'delete-user' ],
        ];

        foreach($roles as $role) {
            \App\Models\Permission::create([
                'name' => $role['name'],
                'slug' => $role['slug']
            ]);
        }
    }
}
