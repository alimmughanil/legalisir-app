<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('role', 'User')->inRandomOrder()->first();
        $order = Order::where('user_id', $user->id)->inRandomOrder()->first();

        $statusPayment = ['Paid','Unpaid'];
        // if ($order) {
        //     if ($order->status == "Pending") {
        //         $statusPayment = ['Pending'];
        //     }
        //     if ($order->status == "Confirm") {
        //         $statusPayment = ['Paid'];
        //     }
        //     if ($order->status == "Delivery") {
        //         $statusPayment = ['Paid'];
        //     }
        //     if ($order->status == "Paid") {
        //         $statusPayment = ['Paid'];
        //     }
        //     if ($order->status == "Unpaid") {
        //         $statusPayment = ['Paid','Unpaid'];
        //     }
        // }

        return [
            'user_id' => $this->faker->unique(true)->numberBetween(3,13),
            'order_id' => $this->faker->unique(true)->numberBetween(1,10),
            'status' => $this->faker->randomElement($statusPayment)
        ];
    }
}