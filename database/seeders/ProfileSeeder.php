<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Profile::factory()->count(2)->create();
        Profile::create([
            'user_id' => 4,
            'school_id' => 1,
            'address_id' => 3,
            'student_id' => rand(1111111111,9999999999),
            'photo' => "https://source.unsplash.com/random/100x100/?landscape",
            'graduated_at' => 2019,
        ]);
        
        Profile::create([
            'user_id' => 5,
            'school_id' => 1,
            'address_id' => 4,
            'student_id' => rand(1111111111,9999999999),
            'photo' => "https://source.unsplash.com/random/100x100/?landscape",
            'graduated_at' => 2019,
        ]);
    }
}