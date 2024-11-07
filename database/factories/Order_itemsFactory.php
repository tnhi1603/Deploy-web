<?php

namespace Database\Factories;

use App\Models\Watch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_items>
 */
class Order_itemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1,3);
        $watch = Watch::all()->random();
        return [
            //
            'watch_id' => $watch->id,
            'quantity' => $quantity,
            'price' => $watch->price * $quantity,
        ];
    }
}
