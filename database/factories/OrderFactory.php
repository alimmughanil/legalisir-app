<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ijazah_idn_qty = rand(1,9);
        $transkrip_idn_qty = rand(1,9);

        $ijazah_eng_qty = rand(1,9);
        $transkrip_eng_qty = rand(1,9);

        $price_idn = 2000;
        $price_eng = 4000;
        
        $price_idn_amount = ($ijazah_idn_qty * $price_idn) + ($transkrip_idn_qty * $price_idn);
        $price_eng_amount = ($ijazah_eng_qty * $price_eng) + ($transkrip_eng_qty * $price_eng);

        $user_id = User::where('role', 'User')->get()->random()->id;

        return [
            'user_id' => $user_id,
            'document_id' => Document::where('user_id', $user_id)->get()->random()->id,
            'transaction_id' => rand(1111111111,9999999999),
            'ijazah_idn_qty' => $ijazah_idn_qty,
            'transkrip_idn_qty' => $transkrip_idn_qty,
            'ijazah_eng_qty' => $ijazah_eng_qty,
            'transkrip_eng_qty' => $transkrip_eng_qty,
            'price_amount' => $price_idn_amount + $price_eng_amount,
            'status' => $this->faker->randomElement(['Pending','Confirm','Delivery','Success','Failed'])
        ];
    }
}
