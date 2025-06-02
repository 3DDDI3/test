<?php

namespace Database\Factories;

use App\Models\OrderType;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerExOrderType>
 */
class WorkerExOrderTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => Worker::inRandomOrder()->first()->id,
            'order_type_id' => OrderType::inRandomOrder()->first()->id,
        ];
    }
}
