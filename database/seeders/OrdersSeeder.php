<?php

namespace Database\Seeders;

use App\Models\Order_items;
use App\Models\Orders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = Orders::factory(20)->create();
        foreach ($orders as $order) {
            $items = Order_items::factory(fake()->numberBetween(1,4))->state(['order_id' => $order->id])->create();
            foreach ($items as $item) { 
                $order->total_prices += $item->price;
            }
            $order->save();
        }
    }
}
