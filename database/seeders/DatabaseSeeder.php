<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SchoolSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\DocumentSeeder;
use Database\Seeders\RajaOngkirAddressSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            RajaOngkirAddressSeeder::class,
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
        // $this->call([
        //     OrderSeeder::class,
        // ]);
        // $this->call([
        //     PaymentSeeder::class,
        // ]);
    }
}