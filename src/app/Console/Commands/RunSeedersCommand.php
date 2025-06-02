<?php

namespace App\Console\Commands;

use Database\Seeders\OrderSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunSeedersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск всех сидов';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        $this->info('UserSeeder выполенен успешно');

        Artisan::call('db:seed', ['--class' => 'PartnershipSeeder']);
        $this->info('PartnershipSeeder выполенен успешно');

        Artisan::call('db:seed', ['--class' => 'WorkerSeeder']);
        $this->info('WorkerSeeder выполенен успешно');

        Artisan::call('db:seed', ['--class' => 'OrderSeeder']);
        $this->info('OrderSeeder выполенен успешно');

        Artisan::call('db:seed', ['--class' => 'OrderWorkerSeeder']);
        $this->info('OrderWorkerSeeder выполенен успешно');

        Artisan::call('db:seed', ['--class' => 'WorkExOrderTypeSeeder']);
        $this->info('WorkExOrderTypeSeeder выполенен успешно');
    }
}
