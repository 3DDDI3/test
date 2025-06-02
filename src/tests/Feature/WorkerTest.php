<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorkerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->withSession(['banned' => false])
            ->get('/api/workers', [
                'orderTypes[]' => 1,
                'orderTypes[]' => 2
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure([[
                'id',
                'name',
                'second_name',
                'surname',
                'phone',
                'created_at',
                'updated_at'
            ]]);
    }
}
