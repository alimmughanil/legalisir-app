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
        return [
            'user_id' => User::where('role', 'User')->get()->random()->id,
            'ijazah' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'transkrip' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'status' => $this->faker->randomElement(['Pending', 'Confirm', 'Reject'])
        ];
    }
}
