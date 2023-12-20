<?php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number');
            $table->foreignId('inventory_id')->constrained('inventories');
            $table->foreignId('user_id')->constrained('users');
            $table->float('quantity');
            $table->dateTime('purchased_on');
            $table->boolean('is_sold')->default(false);
            $table->dateTime('sold_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
