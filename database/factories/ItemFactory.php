<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(50),
            'image_path' => $this->faker->imageUrl(),
            'item_type_id' => $this->faker->numberBetween(1, 2),
            'item_category_id' => $this->faker->numberBetween(1, 3),
            'item_state_id' => max(1, rand(-10, 4))
        ];
    }
}
