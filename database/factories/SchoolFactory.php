<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique(true)->numberBetween(1,2),
            'school_name' => "SMA N ". rand(1,9). " " . $this->faker->city(),
            'school_icon' => "https://source.unsplash.com/random/100x100/?landscape",
            'school_address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'provice' => $this->faker->state(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
        ];

    }
}
