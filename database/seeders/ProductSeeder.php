<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب كل الـ categories كـ [slug => id]
        $categories = Category::pluck('id', 'slug')->toArray();

        // مصفوفة المنتجات
        $products = [
            [
                'name' => 'Almonds',
                'slug' => 'almonds',
                'description' => 'High-quality almonds, perfect for snacking and baking.',
                'price' => 15.99,
                'sale_price' => 12.99,
                'category_slug' => 'nuts',
                'main_stock' => 100,
                'status' => 'متاح',
                'cost_price' => 4.00,
            ],
            [
                'name' => 'Dried Apricots',
                'slug' => 'dried-apricots',
                'description' => 'Sweet and tangy dried apricots, packed with nutrients.',
                'price' => 10.99,
                'sale_price' => 8.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 150,
                'status' => 'متاح',
                'cost_price' => 4.00,
            ],
            [
                'name' => 'Cashews',
                'slug' => 'cashews',
                'description' => 'Premium cashews, perfect for snacking.',
                'price' => 20.50,
                'sale_price' => 18.00,
                'category_slug' => 'nuts',
                'main_stock' => 80,
                'status' => 'متاح',
                'cost_price' => 6.50,
            ],
            // أضف منتجات أخرى بنفس الطريقة
        ];

        foreach ($products as $p) {
            // تحقق من وجود الـ category
            if (!isset($categories[$p['category_slug']])) {
                $this->command->warn("Category slug {$p['category_slug']} not found, skipping product {$p['name']}.");
                continue;
            }

            Product::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'name' => $p['name'],
                    'description' => $p['description'],
                    'price' => $p['price'],
                    'sale_price' => $p['sale_price'],
                    'category_id' => $categories[$p['category_slug']],
                    'main_stock' => $p['main_stock'],
                    'status' => $p['status'],
                    'cost_price' => $p['cost_price'],
                ]
            );
        }
    }
}
