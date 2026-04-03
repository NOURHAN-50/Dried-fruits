<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::updateOrCreate([
            'name' => 'Almonds',
            'slug' => 'almonds',
            'description' => 'High-quality almonds, perfect for snacking and baking.',
            'price' => 15.99,
            'sale_price' => 12.99,
            'category_id' => 1, // Assuming category_id 1 is for Nuts
            'stock' => 100,

        ]);
        Product::updateOrCreate([
            'name' => 'Dried Apricots',
            'slug' => 'dried-apricots',
            'description' => 'Sweet and tangy dried apricots, packed with nutrients.',
            'price' => 10.99,
            'sale_price' => 8.99,
            'category_id' => 2, // Assuming category_id 2 is for Dried
            'stock' => 150,
            'status' => 'active',
        ]);
        Product::updateOrCreate([
            'name' => 'Sunflower Seeds',
            'slug' => 'sunflower-seeds',
            'description' => 'Crunchy sunflower seeds, great for snacking and salads.',
            'price' => 5.99,
            'sale_price' => 4.99,
            'category_id' => 3, // Assuming category_id 3 is for Seeds
            'stock' => 200,
            'status' => 'active',

        ]);
        Product::updateOrCreate([
            'name' => 'Trail Mix',
            'slug' => 'trail-mix',
            'description' => 'A delicious mix of nuts, dried fruits, and seeds.',
            'price' => 12.99,
            'sale_price' => 9.99,
            'category_id' => 4, // Assuming category_id 4 is for Mixes
            'stock' => 120,
            'status' => 'active',
        ]);
        Product::updateOrCreate([
            'name' => 'Organic Walnuts',
            'slug' => 'organic-walnuts',
            'description' => 'Premium organic walnuts, perfect for baking and snacking.',
            'price' => 18.99,
            'sale_price' => 14.99,
            'category_id' => 5, // Assuming category_id 5 is for Organic
            'stock' => 80,
            'status' => 'active',
        ]);
        Product::updateOrCreate([
            'name' => 'Pistachios',
            'slug' => 'pistachios',
            'description' => 'Delicious pistachios, perfect for snacking and cooking.',
            'price' => 14.99,
            'sale_price' => 11.99,
            'category_id' => 1, // Assuming category_id 1 is for Nuts
            'stock' => 90,
            'status' => 'active',
        ]);
        Product::updateOrCreate([
            'name' => 'Dried Mangoes',
            'slug' => 'dried-mangoes',
            'description' => 'Sweet and chewy dried mangoes, packed with flavor.',
            'price' => 11.99,
            'sale_price' => 9.99,
            'category_id' => 2, // Assuming category_id 2 is for Dried
            'stock' => 130,
        ]);
        Product::updateOrCreate([
            'name' => 'Chia Seeds',
            'slug' => 'chia-seeds',
            'description' => 'Nutrient-rich chia seeds, perfect for smoothies and baking.',
            'price' => 6.99,
            'sale_price' => 5.99,
            'category_id' => 3, // Assuming category_id 3 is for Seeds
            'stock' => 180,
            'status' => 'active',

        ]);


        //
    }
}
