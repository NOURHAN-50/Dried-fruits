<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItem::updateOrCreate([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'unit_price' => 50.00
        ]);
        OrderItem::updateOrCreate([
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'unit_price' => 50.00,
        ]);
        OrderItem::updateOrCreate([
            'order_id' => 2,
            'product_id' => 3,
            'quantity' => 3,
            'unit_price' => 60.00,
        ]);
        OrderItem::updateOrCreate([
            'order_id' => 2,
            'product_id' => 4,
            'quantity' => 2,
            'unit_price' => 40.00,
            
        ]);
        //
    }
}
