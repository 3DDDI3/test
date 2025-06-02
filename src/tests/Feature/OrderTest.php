<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderWorker;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class OrderTest extends TestCase
{

    /**
     * Тестирвоание прикрепления исполнителя к заказу
     *
     * @return void
     */
    public function test_order_worker_attach_test(): void
    {
        $user = User::factory()->create();
        $order = Order::factory()->create();
        $worker = Worker::factory()->create();
        OrderWorker::factory()->create([
            'order_id' => $order->id,
            'worker_id' => $worker->id,
            'amount' => fake()->numberBetween(1000, 10000),
        ]);

        $response = $this->actingAs($user, 'api')
            ->withSession(['banned' => false])
            ->post("/api/orders/{$order->id}/worker", [
                'worker' => $worker->id,
            ]);

        $response->assertStatus(200);
    }

    /**
     * Обновление статуса заказа
     *
     * @return void
     */
    public function test_order_status_update()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create();
        $worker = Worker::factory()->create();
        OrderWorker::factory()->create([
            'order_id' => $order->id,
            'worker_id' => $worker->id,
            'amount' => fake()->numberBetween(1000, 10000),
        ]);

        $response = $this->actingAs($user, 'api')
            ->withSession(['banned' => false])
            ->patch("/api/orders/{$order->id}");

        $response->assertStatus(200);
    }
}
