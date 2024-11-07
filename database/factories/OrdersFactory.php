<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'customer')->get()->random();
        return [
            //
            'user_id' => $user->id,
            'address_id' => $user->defaultAddress->address_id,
            'status' => fake()->randomElement(['Pending', 'Shipping', 'Success']),
            'total_prices' => 0,
            'ship_fee' => fake()->randomElement([30000, 35000, 25000, 40000]),
            'voucher_id' => null, 
        ];
    }
}
