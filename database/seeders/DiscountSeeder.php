<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use App\Models\Product;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::pluck('id', 'slug')->toArray();

        Discount::updateOrCreate([
            'code' => 'HOLIDAY20'
        ], [
            'name' => 'خصم العطلة',
            'description' => 'خصم 20% على جميع الأوردرات',
            'value' => 20,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-04-15',
            'usage_limit' => 500,
            'target_type' => 'order',
            'target_id' => null,
        ]);

        Discount::updateOrCreate([
            'code' => 'ALMONDS10'
        ], [
            'name' => 'خصم اللوز',
            'description' => 'خصم 10% على اللوز فقط',
            'value' => 10,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-05-01',
            'usage_limit' => 200,
            'target_type' => 'product',
            'target_id' => $products['almonds'] ?? null,
        ]);

        Discount::updateOrCreate([
            'code' => 'CASHEWS15'
        ], [
            'name' => 'خصم الكاجو',
            'description' => 'خصم 15% على الكاجو',
            'value' => 15,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-06-01',
            'usage_limit' => 150,
            'target_type' => 'product',
            'target_id' => $products['cashews'] ?? null,
        ]);

        Discount::updateOrCreate([
            'code' => 'VIP50'
        ], [
            'name' => 'خصم VIP',
            'description' => 'خصم ثابت 50 جنيه على الأوردر',
            'value' => 50,
            'type' => 'fixed',
            'active' => true,
            'expires_at' => '2026-12-31',
            'usage_limit' => 100,
            'target_type' => 'order',
            'target_id' => null,
        ]);

        Discount::updateOrCreate([
            'code' => 'MIXES10'
        ], [
            'name' => 'خصم المكسات',
            'description' => 'خصم 10% على جميع المكسات',
            'value' => 10,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-06-30',
            'usage_limit' => 200,
            'target_type' => 'product',
            'target_id' => $products['mixed-nuts'] ?? null,
        ]);

        Discount::updateOrCreate([
            'code' => 'SEEDS12'
        ], [
            'name' => 'خصم البذور',
            'description' => 'خصم 12% على جميع البذور',
            'value' => 12,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-07-15',
            'usage_limit' => 180,
            'target_type' => 'product',
            'target_id' => $products['sunflower-seeds'] ?? null,
        ]);

        Discount::updateOrCreate([
            'code' => 'FIRST20'
        ], [
            'name' => 'خصم أول أوردر',
            'description' => 'خصم 20% لأول طلب للعميل',
            'value' => 20,
            'type' => 'percentage',
            'active' => true,
            'expires_at' => '2026-12-31',
            'usage_limit' => 1000,
            'target_type' => 'order',
            'target_id' => null,
        ]);

        Discount::updateOrCreate([
            'code' => 'WINTER50'
        ], [
            'name' => 'خصم الشتاء',
            'description' => 'خصم ثابت 50 جنيه على الأوردرات في الشتاء',
            'value' => 50,
            'type' => 'fixed',
            'active' => true,
            'expires_at' => '2027-02-28',
            'usage_limit' => 300,
            'target_type' => 'order',
            'target_id' => null,
        ]);

    }
}
