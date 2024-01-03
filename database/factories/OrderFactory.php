<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //use the faker to hard code some info.
            'total' => rand(1*100, 100*100)/100,
            'user_id' => rand(1,6),
            'returned_at' => Carbon::now(),
        ];
    }
}
