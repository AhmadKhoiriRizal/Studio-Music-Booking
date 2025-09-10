<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat admin
        User::create([
            'id' => 'ADMIN@123',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'photo' => 'media/avatars/blank.png',
            'phone' => '081234567890',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat user biasa
        User::create([
            'id' => Helper::generateUniqueUserId(new User),
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'photo' => 'media/avatars/blank.png',
            'phone' => '081298765432',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Buat beberapa user dummy
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'id' => Helper::generateUniqueUserId(new User),
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'photo' => 'media/avatars/blank.png',
                'phone' => '0812' . rand(10000000, 99999999),
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);
        }

        // User dengan Google login
        User::create([
            'id' => Helper::generateUniqueUserId(new User),
            'name' => 'Google User',
            'email' => 'googleuser@example.com',
            'photo' => 'media/avatars/blank.png',
            'phone' => '081355577799',
            'password' => Hash::make(uniqid()), // Password random
            'google_id' => 'google_123456789',
            'role' => 'user',
        ]);
    }
}
