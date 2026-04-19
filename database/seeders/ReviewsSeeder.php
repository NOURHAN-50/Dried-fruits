<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$customers = User::all();
        $products = Product::all();

        for ($i = 0; $i < 10; $i++) { // إنشاء 10 تقييمات عشوائية
            $customer = $customers->random();
            $product = $products->random();

            Review::create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'rating' => rand(1, 5),
                'comment' => "تعليق تجريبي رقم $i",
                'approved' => rand(0, 1),
            ]);
        }
    }
}
