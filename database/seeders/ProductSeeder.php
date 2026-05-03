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
        $categories = Category::pluck('id', 'slug')->toArray();

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
                'image' => 'products/almonds.jpg',
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
                'image' => 'products/dried-apricots.jpg',
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
                'image' => 'products/cashews.jpg',
            ],

            [
                'name' => 'Walnuts',
                'slug' => 'walnuts',
                'description' => 'Fresh walnuts rich in omega-3.',
                'price' => 18.99,
                'sale_price' => 15.99,
                'category_slug' => 'nuts',
                'main_stock' => 90,
                'status' => 'متاح',
                'cost_price' => 5.50,
                'image' => 'products/walnuts.jpg',
            ],
            [
                'name' => 'Pistachios',
                'slug' => 'pistachios',
                'description' => 'Crunchy premium pistachios.',
                'price' => 25.99,
                'sale_price' => 22.99,
                'category_slug' => 'nuts',
                'main_stock' => 70,
                'status' => 'متاح',
                'cost_price' => 8.00,
                'image' => 'products/pistachios.jpg',
            ],
            [
                'name' => 'Raisins',
                'slug' => 'raisins',
                'description' => 'Sweet dried raisins full of flavor.',
                'price' => 8.99,
                'sale_price' => 6.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 200,
                'status' => 'متاح',
                'cost_price' => 2.50,
                'image' => 'products/raisins.jpg',
            ],
            [
                'name' => 'Dried Mango',
                'slug' => 'dried-mango',
                'description' => 'Naturally sweet dried mango slices.',
                'price' => 14.99,
                'sale_price' => 11.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 120,
                'status' => 'متاح',
                'cost_price' => 4.50,
                'image' => 'products/dried-mango.jpg',
            ],
            [
                'name' => 'Dried Pineapple',
                'slug' => 'dried-pineapple',
                'description' => 'Tropical dried pineapple rings.',
                'price' => 13.99,
                'sale_price' => 10.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 110,
                'status' => 'متاح',
                'cost_price' => 4.20,
                'image' => 'products/dried-pineapple.jpg',
            ],
            [
                'name' => 'Dates',
                'slug' => 'dates',
                'description' => 'Sweet premium dates.',
                'price' => 9.99,
                'sale_price' => 7.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 180,
                'status' => 'متاح',
                'cost_price' => 3.00,
                'image' => 'products/dates.jpg',
            ],
            [
                'name' => 'Hazelnuts',
                'slug' => 'hazelnuts',
                'description' => 'Fresh roasted hazelnuts.',
                'price' => 19.99,
                'sale_price' => 16.99,
                'category_slug' => 'nuts',
                'main_stock' => 75,
                'status' => 'متاح',
                'cost_price' => 6.00,
                'image' => 'products/hazelnuts.jpg',
            ],
            [
                'name' => 'Peanuts',
                'slug' => 'peanuts',
                'description' => 'Classic roasted peanuts.',
                'price' => 6.99,
                'sale_price' => 5.49,
                'category_slug' => 'nuts',
                'main_stock' => 250,
                'status' => 'متاح',
                'cost_price' => 2.00,
                'image' => 'products/peanuts.jpg',
            ],
            [
                'name' => 'Dried Figs',
                'slug' => 'dried-figs',
                'description' => 'Soft dried figs with natural sweetness.',
                'price' => 12.99,
                'sale_price' => 9.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 140,
                'status' => 'متاح',
                'cost_price' => 4.30,
                'image' => 'products/dried-figs.jpg',
            ],
            [
                'name' => 'Mixed Nuts',
                'slug' => 'mixed-nuts',
                'description' => 'Delicious premium nuts mix.',
                'price' => 22.99,
                'sale_price' => 19.99,
                'category_slug' => 'nuts',
                'main_stock' => 95,
                'status' => 'متاح',
                'cost_price' => 7.00,
                'image' => 'products/mixed-nuts.jpg',
            ],
            [
                'name' => 'Dried Cranberries',
                'slug' => 'dried-cranberries',
                'description' => 'Tangy dried cranberries.',
                'price' => 11.99,
                'sale_price' => 8.99,
                'category_slug' => 'dried-fruits',
                'main_stock' => 130,
                'status' => 'متاح',
                'cost_price' => 3.80,
                'image' => 'products/dried-cranberries.jpg',
            ],
            [
                'name' => 'Sunflower Seeds',
                'slug' => 'sunflower-seeds',
                'description' => 'Healthy crunchy sunflower seeds.',
                'price' => 5.99,
                'sale_price' => 4.49,
                'category_slug' => 'nuts',
                'main_stock' => 220,
                'status' => 'متاح',
                'cost_price' => 1.80,
                'image' => 'products/sunflower-seeds.jpg',
            ],
            [
                'name' => 'Pumpkin Seeds',
                'slug' => 'pumpkin-seeds',
                'description' => 'Nutrient-rich pumpkin seeds.',
                'price' => 7.99,
                'sale_price' => 6.49,
                'category_slug' => 'nuts',
                'main_stock' => 160,
                'status' => 'متاح',
                'cost_price' => 2.20,
                'image' => 'products/pumpkin-seeds.jpg',
            ],
            [
                'name' => 'Dried Kiwi',
                'slug' => 'dried-kiwi',
                'description' => 'Sweet and tangy dried kiwi slices.',
                'price' => 13.49,
                'sale_price' => 10.49,
                'category_slug' => 'dried-fruits',
                'main_stock' => 100,
                'status' => 'متاح',
                'cost_price' => 4.10,
                'image' => 'products/dried-kiwi.jpg',
            ],
            [
                'name' => 'Macadamia Nuts',
                'slug' => 'macadamia-nuts',
                'description' => 'Luxury creamy macadamia nuts.',
                'price' => 29.99,
                'sale_price' => 25.99,
                'category_slug' => 'nuts',
                'main_stock' => 60,
                'status' => 'متاح',
                'cost_price' => 10.00,
                'image' => 'products/macadamia-nuts.jpg',
            ],
        ];

           foreach ($products as $p) {
            if (!isset($categories[$p['category_slug']])) {
                $this->command->warn("Category slug {$p['category_slug']} not found, skipping product {$p['name']}.");
                continue;
            }

            $product = Product::updateOrCreate(
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

            $product->images()->create([
                'path' => $p['image'],
                'is_main' => true,
            ]);
        }
    }
}
