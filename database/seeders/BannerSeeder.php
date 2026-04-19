<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $locations = ['homepage', 'sidebar', 'footer'];

        for ($i = 1; $i <= 3; $i++) {
            Banner::create([
                'title' => 'بنر تجريبي ' . $i,
                'location' => $faker->randomElement($locations),
                'link' => $faker->url(),
                'is_active' => $faker->boolean(80), // 80% احتمال يكون مفعل
                'start_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+1 month'),
            ]);
        }
    }

        //
}

