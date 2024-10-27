<?php

namespace Database\Factories;

use App\Models\Product;
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
            'product_id' => Product::inRandomOrder()->first()->id, 
            'type' => $this->faker->randomElement(['open_stock', 'purchase', 'sell', 'sell_return', 'purchase_return', 'adjustment']),
            'quantity' => $this->faker->numberBetween(1, 20),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'created_at' => $this->faker->dateTimeBetween('first day of January this year', 'last day of December this year'),        ];
    }
}
