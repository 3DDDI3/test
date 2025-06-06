<?php

namespace Database\Seeders;

use App\Models\WorkerExOrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkExOrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkerExOrderType::factory(50)->create();
    }
}
