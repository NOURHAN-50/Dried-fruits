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
        Category::updateOrCreate([
            'name' => 'Nuts',
            'slug' => 'nuts',
        ]);
        Category::updateOrCreate([
            'name' => 'Dried Fruits',
            'slug' => 'dried-fruits',
        ]);
        Category::updateOrCreate    ([
            'name' => 'Seeds',
            'slug' => 'seeds',
        ]);
        Category::updateOrCreate([
            'name' => 'Mixes',
            'slug' => 'mixes',
        ]);
        Category::updateOrCreate([
            'name' => 'Organic',
            'slug' => 'organic',
        ]);

        //
    }
}
