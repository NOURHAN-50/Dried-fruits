<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        $categories = [
            ['name' => 'Nuts', 'slug' => 'nuts', 'image' => 'categories/nuts.jpg'],
            ['name' => 'Dried Fruits', 'slug' => 'dried-fruits', 'image' => 'categories/dried-fruitss.jpg'],
            ['name' => 'Seeds', 'slug' => 'seeds', 'image' => 'categories/seeds.jpg'],
            ['name' => 'Mixes', 'slug' => 'mixes', 'image' => 'categories/mixes.jpg'],
            ['name' => 'Organic', 'slug' => 'organic', 'image' => 'categories/organic.jpg'],
        ];

        foreach ($categories as $c) {

            $category = Category::updateOrCreate(
                ['slug' => $c['slug']],
                ['name' => $c['name']]
            );

            $category->images()->create([
                'path' => $c['image'],
                'is_main' => true,
            ]);
        }

    }
}
