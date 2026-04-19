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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()
            ->constrained('users')
            ->onDelete('cascade');
            $table->string('customer_name');
            $table->foreignId('shipping_zone_id')->constrained('shipping_zones')
            ->onDelete('cascade');
            $table->decimal('shipping_price', 10, 2);
            $table->string('phone');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->text('address');
            $table->decimal('cost', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->string('notes')->nullable();
            $table->decimal('discount_total', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
