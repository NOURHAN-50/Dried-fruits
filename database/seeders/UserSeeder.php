<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin User',
        'phone' => '01151513447',
        'password' => Hash::make('123456789'),
        'role' => 'admin',
    ]
);

User::updateOrCreate(
    ['email' => 'omar@example.com'],
    [
        'name' => 'Omar User',
        'phone'=> '01151513448',
        'password' => Hash::make('password'),
        'role' => 'user',
    ]
);


        //
    }
}
