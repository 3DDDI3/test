<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderWorker>
 */
class OrderWorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'worker_id' => Worker::inRandomOrder()->first()->id,
            'amount' => fake()->numberBetween(1000, 10000),
        ];
    }
}
