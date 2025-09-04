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
            'id' => Helper::generateUniqueUserId(new User),
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat user biasa
        User::create([
            'id' => Helper::generateUniqueUserId(new User),
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Buat beberapa user dummy
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'id' => Helper::generateUniqueUserId(new User),
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);
        }

        // User dengan Google login
        User::create([
            'id' => Helper::generateUniqueUserId(new User),
            'name' => 'Google User',
            'email' => 'googleuser@example.com',
            'password' => Hash::make(uniqid()), // Password random
            'google_id' => 'google_123456789',
            'role' => 'user',
        ]);
    }
}
