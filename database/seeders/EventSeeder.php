<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $events = [
//            [
//                'title' => 'Pizza Sale',
//                'description' => 'title',
//                'image_path' => '/images/events/Pizza_Sale_PDF.jpg',
//                'dated_at' => new Carbon('first day of January 2024', 'America/Vancouver')
//            ],
//            [
//                'title' => 'IEEE Bxxr Night',
//                'description' => 'title',
//                'image_path' => '/images/events/IEEE_Bxxr_Night_Nov_17th-1.jpg',
//                'dated_at' => new Carbon('first day of November 2023', 'America/Vancouver')
//            ],
//            [
//                'title' => 'Movember',
//                'description' => 'title',
//                'image_path' => '/images/events/Movember_Poster.jpg',
//                'dated_at' => new Carbon('first day of November 2023', 'America/Vancouver')
//            ],
//        ];


        $csvFile = database_path('seeders/seeds').'/events.csv';

        if (($file = fopen($csvFile, "r")) !== FALSE) {
            while (!feof($file)) {
                $data = explode(';', str_replace('"','',fgets($file)));

                \App\Models\Event::create([
                    'title' => trim($data[0]),
                    'description' => trim($data[1]),
                    'image_path' => trim($data[2]),
                    'dated_at' => trim($data[3]),
                ]);
            }
        }
    }
}
