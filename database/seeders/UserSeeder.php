<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(2)->create();
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@legalisirku.com",
            'role' => "Super Admin",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
        User::create([
            'name' => "Admin SMK",
            'email' => "admin@admin.com",
            'role' => "Admin",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
        User::create([
            'name' => "Admin SMA",
            'email' => "admin2@admin.com",
            'role' => "Admin",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
        User::create([
            'name' => "Alim Mughanil",
            'email' => "alim.mughanil23@gmail.com",
            'role' => "User",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
        
        User::create([
            'name' => "Rudi",
            'email' => "rudi@gmail.com",
            'role' => "User",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
    }
}