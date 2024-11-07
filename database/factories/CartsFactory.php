<?php

namespace Database\Factories;

use App\Models\Carts;
use App\Models\User;
use App\Models\Watch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carts>
 */
class CartsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'customer')->get()->random();
        $watch = Watch::all()->random();

        return [
            //
            'user_id' => $user->id,
            'watch_id' => $watch->id,
            'quantity' => fake()->numberBetween(1,5),
        ];
    }
}
