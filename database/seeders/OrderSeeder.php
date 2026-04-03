<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::first();
        Order::updateOrCreate([
            'customer_id' => $user->id,
            'customer_name' => 'Admin User',
            'total_price' => 100.00,
            'status' => 'pending',
            'phone' => '1234567890',
            'address' => '123 Main St, Anytown, USA',
            'discount_total' => 10.00,
            'notes' => 'Please deliver between 9 AM and 5 PM'
        ]);
        Order::updateOrCreate([
            'customer_id' => $user->id,
            'customer_name' => 'John Doe',
            'total_price' => 200.00,
            'status' => 'pending',
            'phone' => '0987654321',
            'address' => '456 Elm St, Othertown, USA',
            'discount_total' => 20.00,
            'notes' => 'Leave package at the front door'
        ]);
        Order::updateOrCreate([
            'customer_id' => $user->id,
            'customer_name' => 'Jane Smith',
            'total_price' => 150.00,
            'status' => 'pending',
            'phone' => '5555555555',
            'address' => '789 Oak St, Sometown, USA',
            'discount_total' => 15.00,
            'notes' => 'Call upon arrival'
        ]);


        //
    }
}
