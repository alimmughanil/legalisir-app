<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\document>
 */
class documentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('role', 'User')->inRandomOrder()->first();
        return [
            'user_id' => $this->faker->unique(true)->numberBetween(3,13),
            'school_id' => rand(1,2),
            'ijazah' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'transkrip' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'statement_letter' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'status' => $this->faker->randomElement(['Pending', 'Confirm', 'Reject'])
        ];
    }
}
