<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Rent', 'badge_color' => 'bg-blue-50 text-blue-700 ring-blue-700/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/30'],
            ['name' => 'Sell', 'badge_color' => 'bg-green-50 text-green-700 ring-green-600/20 dark:bg-green-500/10 dark:text-green-400 dark:ring-green-500/20'],
        ];

        foreach($types as $type) {
            \App\Models\ItemType::create([
                'name' => $type['name'],
                'badge_color' => $type['badge_color'],
            ]);
        }
    }
}
