<?php

namespace Database\Seeders;

use App\Models\Textbook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        \App\Models\Textbook::factory(100)->create();

        $csvFile = database_path('seeders/seeds').'/textbooks.tsv';

        if (($file = fopen($csvFile, "r")) !== FALSE) {
            while (!feof($file)) {
                $data = explode(';', str_replace('"','',fgets($file)));

                \App\Models\Textbook::create([
                    'title' => trim($data[0]),
                    'author' => trim($data[1]),
                    'cover' => trim($data[2]),
                    'textbook_state_id' => max(1, rand(-10, 2))
                ]);
            }
        }
    }
}
