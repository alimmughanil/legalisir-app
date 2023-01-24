<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $school = School::all()->random();
        $user = User::where('role', 'User')->get()->random();
        return [
            'user_id' => $this->faker->unique(true)->numberBetween(3,13),
            'school_id' => rand(1,2),
            'student_id' => rand(1111111111,9999999999),
            'graduated_at' => $this->faker->year('-'.rand(1,12).'years'),
            'photo' => "https://source.unsplash.com/random/100x100/?landscape",
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
        ];
    }
}
