<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $newUser = \App\Models\User::create([
            'name' => 'Ringo',
            'email' => 'ringo@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 1,
        ]);
        $newUser->roles()->attach(1);

        $newUser = \App\Models\User::create([
            'name' => 'Harkaran',
            'email' => 'karan@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 1
        ]);
        $newUser->roles()->attach(2);

        $newUser = \App\Models\User::create([
            'name' => 'Ruobing',
            'email' => 'ruobing@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 2
        ]);
        $newUser->roles()->attach(2);

        $newUser = \App\Models\User::create([
            'name' => 'Harpereet',
            'email' => 'harpereet@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 2
        ]);
        $newUser->roles()->attach(2);

        $newUser = \App\Models\User::create([
            'name' => 'Darian',
            'email' => 'darian@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 1
        ]);
        $newUser->roles()->attach(2);

        $newUser = \App\Models\User::create([
            'name' => 'Mac',
            'email' => 'mac@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 2
        ]);
        $newUser->roles()->attach(2);

    }
}
