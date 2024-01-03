<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Admin',
            'Executive',
            'Member',
            'User',
        ];

        foreach($items as $item) {
            \App\Models\Team::create([
                'user_id' => 1,
                'name' => $item,
                'personal_team' => false
            ]);
        }
    }
}
