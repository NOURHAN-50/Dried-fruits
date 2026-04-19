<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingZone;

class ShippingZoneSeeder extends Seeder
{
    public function run(): void
    {
        $zones = [
            [
                'name' => 'Cairo',
                'price' => 25.00,
                'is_cod_available' => true,
            ],
            [
                'name' => 'Giza',
                'price' => 20.00,
                'is_cod_available' => true,
            ],
            [
                'name' => 'Alexandria',
                'price' => 35.00,
                'is_cod_available' => true,
            ],
            [
                'name' => 'Delta Regions',
                'price' => 40.00,
                'is_cod_available' => false,
            ],
            [
                'name' => 'Upper Egypt',
                'price' => 50.00,
                'is_cod_available' => false,
            ],
        ];

        foreach ($zones as $zone) {
            ShippingZone::updateOrCreate(
                ['name' => $zone['name']],
                $zone
            );
        }
    }
}
