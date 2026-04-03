<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::updateOrCreate([
            'name' => 'خصم العطلة'
        ], [
            'code' => 'HOLIDAY20',
            'description' => 'خصم 20% على جميع المنتجات خلال العطلة',
            'value' => 20,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-04-15',
            'usage_limit' => 500,
        ]);
        Discount::updateOrCreate([
            'name' => 'خصم الصيف'
        ], [
            'code' => 'SUMMER15',

            'description' => 'خصم 15% على جميع المنتجات خلال فصل الصيف',
            'value' => 15,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-09-30',
            'usage_limit' => 300,
        ]);
        Discount::updateOrCreate([
            'name' => 'خصم خاص'
        ], [
            'code' => 'VIP10',
            'description' => 'خصم 10% على جميع المنتجات لعملائنا المميزين',
            'value' => 10,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-12-31',
            'usage_limit' => 100,
        ]);
    }
}
