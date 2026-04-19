<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
$orders = Order::all();
$products = Product::all();

if ($orders->isEmpty() || $products->isEmpty()) {
    $this->command->info('لا يوجد طلبات أو منتجات لإنشاء عناصر الطلب.');
    return;
}

foreach ($orders as $order) {
    $product = $products->random(); // استخدام منتج موجود
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => rand(1, 5),
        'unit_price' => $product->price,
        'cost' => $product->cost_price,
    ]);
}}}
