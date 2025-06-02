<?php

namespace Database\Factories;

use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Support\Str;
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
            'order_type_id' => OrderType::inRandomOrder()->first()->id,
            'partnership_id' => Partnership::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'description' => fake()->text(200),
            'address' => fake()->address(),
            'amount' => fake()->numberBetween(1000, 10000),
            'status' => fake()->randomElement(['Создан', 'назначен исполнитель', 'завершен']),
            'date' => fake()->date()
        ];
    }
}
