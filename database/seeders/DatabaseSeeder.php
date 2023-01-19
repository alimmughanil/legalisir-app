<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\SchoolSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\DocumentSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@legalisir.com",
            'role' => "Super Admin",
            'email_verified_at' => now(),
            'password' => Hash::make('rahasia123'),
            'remember_token' => Str::random(16),
        ]);
        User::create([
            'name' => "SMK N 1 Adiwerna",
            'email' => "admin@admin.com",
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

        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            SchoolSeeder::class,
        ]);
        $this->call([
            ProfileSeeder::class,
        ]);
        $this->call([
            DocumentSeeder::class,
        ]);
        $this->call([
            OrderSeeder::class,
        ]);
        $this->call([
            PaymentSeeder::class,
        ]);
    }
}
