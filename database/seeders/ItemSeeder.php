<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        \App\Models\Item::factory(100)->create();

        $csvFile = database_path('seeders/seeds').'/equipment.tsv';

        if (($file = fopen($csvFile, "r")) !== FALSE) {
            while (!feof($file)) {
                $data = explode(';', str_replace('"','',fgets($file)));

                \App\Models\Item::create([
                    'name' => trim($data[0]),
                    'description' => '',
                    'image_path' => trim($data[1]),
                    'item_type_id' => 1,
                    'item_category_id' => 2,
                    'item_state_id' => 1
                ]);
            }
        }


        $csvFile = database_path('seeders/seeds').'/drinks.tsv';

        if (($file = fopen($csvFile, "r")) !== FALSE) {
            while (!feof($file)) {
                $data = explode(';', str_replace('"','',fgets($file)));

                \App\Models\Item::create([
                    'name' => trim($data[0]),
                    'description' => '',
                    'image_path' => trim($data[1]),
                    'item_type_id' => 2,
                    'item_category_id' => 1,
                    'item_state_id' => 1
                ]);
            }
        }


        $csvFile = database_path('seeders/seeds').'/food.tsv';

        if (($file = fopen($csvFile, "r")) !== FALSE) {
            while (!feof($file)) {
                $data = explode(';', str_replace('"','',fgets($file)));

                \App\Models\Item::create([
                    'name' => trim($data[0]),
                    'description' => '',
                    'image_path' => trim($data[1]),
                    'item_type_id' => 2,
                    'item_category_id' => 3,
                    'item_state_id' => 1
                ]);
            }
        }




        $items = Item::all();
        foreach ($items as $item) {
            $price = \App\Models\Price::create([
                'item_id' => $item->id,
                'amount' => rand(1*100, 20*100)/100,
            ]);

        }
    }
}
