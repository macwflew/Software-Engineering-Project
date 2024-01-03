<?php

namespace Database\Factories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'order_id' => rand(1,100),
            'amount' => rand(1*100, 100*100)/100,
            'status' => 'completed',
            'provider'=> $this->faker->creditCardType(),
        ];
    }
}
