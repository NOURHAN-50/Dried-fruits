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
          Schema::create('shipping_zones', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // القاهرة - الجيزة...
    $table->decimal('price', 10, 2);
    $table->boolean('is_cod_available')->default(false); // هل متاح كاش عند الاستلام
    $table->timestamps();
});
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::dropIfExists('shipping_zones');
    }
};
