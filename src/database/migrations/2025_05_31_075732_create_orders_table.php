<?php

use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(OrderType::class)
                ->constrained()
                ->cascadeOnDelete()
                ->restrictOnUpdate();
            $table->foreignIdFor(Partnership::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->dateTime('date')->index('date');
            $table->string('address', 2000);
            $table->decimal('amount');
            $table->string('status')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeignIdFor(OrderType::class);
            $table->dropForeignIdFor(Partnership::class);
            $table->dropForeignIdFor(User::class);
        });

        Schema::dropIfExists('orders');
    }
};
