<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\ShippingZone;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zone = ShippingZone::first();
        $customer=User::first();
        Order::updateOrCreate([
            'customer_id' => $customer->id,
            'customer_name' => 'Admin User',
'shipping_zone_id' => $zone->id,
'shipping_price' => $zone->price,
            'total_price' => 100.00,
            'status' => 'pending',
            'phone' => '1234567890',
            'address' => '123 Main St, Anytown, USA',
            'discount_total' => 10.00,
            'notes' => 'Please deliver between 9 AM and 5 PM',
                        'profit' => 50.00,
            'cost' => 100.00,
        ]);
        Order::updateOrCreate([
            'customer_id' => $customer->id,
            'customer_name' => 'John Doe',
'shipping_zone_id' => $zone->id,
'shipping_price' => $zone->price,
            'total_price' => 200.00,
            'status' => 'pending',
            'phone' => '0987654321',
            'address' => '456 Elm St, Othertown, USA',
            'discount_total' => 20.00,
            'notes' => 'Leave package at the front door',
                        'profit' => 50.00,
            'cost' => 100.00,
        ]);
        Order::updateOrCreate([
            'customer_id' => $customer->id,
            'customer_name' => 'Jane Smith',
'shipping_zone_id' => $zone->id,
'shipping_price' => $zone->price,
            'total_price' => 150.00,
            'status' => 'pending',
            'phone' => '5555555555',
            'address' => '789 Oak St, Sometown, USA',
            'discount_total' => 15.00,
            'notes' => 'Call upon arrival',
            'profit' => 50.00,
            'cost' => 100.00,
            ]);


        //
    }
}
