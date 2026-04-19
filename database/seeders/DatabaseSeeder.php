<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;



    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call([
                UserSeeder::class,
                AdminSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                ShippingZoneSeeder::class,
                ReviewsSeeder::class,
                OrderSeeder::class,
                PaymentSeeder::class,

                OrderItemSeeder::class,
                DiscountSeeder::class,
                SliderSeeder::class,
                BannerSeeder::class,


            ]);

        // User::factory(10)->create();
    }
}
