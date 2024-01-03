<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextbookStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Available', 'badge_color' => 'bg-green-50 text-green-700 ring-green-600/20 dark:bg-green-500/10 dark:text-green-400 dark:ring-green-500/20'],
            ['name' => 'Rented', 'badge_color' => 'bg-gray-50 text-gray-600 ring-gray-500/10 dark:bg-gray-400/10 dark:text-gray-400 dark:ring-gray-400/20'],
        ];

        foreach($states as $state) {
            \App\Models\TextbookState::create([
                'name' => $state['name'],
                'badge_color' => $state['badge_color'],
            ]);
        }
    }
}
