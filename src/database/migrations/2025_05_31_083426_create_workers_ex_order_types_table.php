<?php

use App\Models\OrderType;
use App\Models\Worker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers_ex_order_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Worker::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignIdFor(OrderType::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workers_ex_order_types', function (Blueprint $table) {
            $table->dropForeignIdFor(OrderType::class);
            $table->dropForeignIdFor(Worker::class);
        });

        Schema::dropIfExists('workers_ex_order_types');
    }
};
