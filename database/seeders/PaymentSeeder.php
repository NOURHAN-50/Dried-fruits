<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::updateOrCreate([
            'order_id' => 1,
            'amount' => 90.00,
            'payment_method' => 'credit_card',
            'status' => 'completed',
            'transaction_id' => 'TXN123456',
            'paid_at' => now(),
        ]);
        Payment::updateOrCreate([
            'order_id' => 2,
            'amount' => 180.00,
            'payment_method' => 'paypal',
            'status' => 'completed',
            'transaction_id' => 'TXN654321',
            'paid_at' => now(),
        ]);
        Payment::updateOrCreate([
            'order_id' => 3,
            'amount' => 135.00,
            'payment_method' => 'bank_transfer',
            'status' => 'pending',
            'transaction_id' => null,
            'paid_at' => null,
        ]);
        

        //
    }
}
