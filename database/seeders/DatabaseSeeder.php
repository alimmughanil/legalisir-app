<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\School;
use App\Models\Profile;
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
        
        School::create([
            'user_id' => 2,
            'school_name' => "SMK N ". rand(1,9). " Kendal",
            'school_icon' => "https://source.unsplash.com/random/100x100/?landscape",
            'school_address' => 'Jl. Sunan Kalijaga No. 9',
            'city' => 'Kendal',
            'province' => 'Jawa Tengah',
            'country' => 'Indonesia',
            'postcode' => '10403', 
        ]);
        School::create([
            'user_id' => 3,
            'school_name' => "SMA N ". rand(1,9). " Semarang",
            'school_icon' => "https://source.unsplash.com/random/100x100/?landscape",
            'school_address' => 'Jl. Walisongo No. 9',
            'city' => 'Semarang',
            'province' => 'Jawa Tengah',
            'country' => 'Indonesia',
            'postcode' => '10403', 
        ]);
        Profile::create([
            'user_id' => 4,
            'school_id' => 1,
            'student_id' => rand(1111111111,9999999999),
            'graduated_at' => 2019,
            'photo' => "https://source.unsplash.com/random/100x100/?landscape",
            'address' => 'Jl. Diponegoro No. 119',
            'city' => 'Kendal',
            'province' => 'Jawa Tengah',
            'country' => 'Indonesia',
            'postcode' => '11483', 
        ]);
        
        Profile::create([
            'user_id' => 5,
            'school_id' => 1,
            'student_id' => rand(1111111111,9999999999),
            'graduated_at' => 2022,
            'photo' => "https://source.unsplash.com/random/100x100/?landscape",
            'address' => 'Jl. Sudirman No. 19',
            'city' => 'Semarang',
            'province' => 'Jawa Tengah',
            'country' => 'Indonesia',
            'postcode' => '16483', 
        ]);

        // $this->call([
        //     UserSeeder::class,
        // ]);
        // $this->call([
        //     SchoolSeeder::class,
        // ]);
        // $this->call([
        //     ProfileSeeder::class,
        // ]);
        // $this->call([
        //     DocumentSeeder::class,
        // ]);
        // $this->call([
        //     OrderSeeder::class,
        // ]);
        // $this->call([
        //     PaymentSeeder::class,
        // ]);
    }
}