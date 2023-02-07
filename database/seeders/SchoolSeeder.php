<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // School::factory()->count(2)->create();
        School::create([
            'user_id' => 2,
            'school_address_id' => 1,
            'school_name' => "SMK N ". rand(1,9). " Kendal",
            'school_icon' => "https://source.unsplash.com/random/100x100/?landscape",
        ]);
        School::create([
            'user_id' => 3,
            'school_address_id' => 2,
            'school_name' => "SMA N ". rand(1,9). " Semarang",
            'school_icon' => "https://source.unsplash.com/random/100x100/?landscape",
        ]);
    }
}