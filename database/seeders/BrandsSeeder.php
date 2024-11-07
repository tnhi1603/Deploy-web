<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::create([
            'name' => 'Richard Mille',
        ]);
        Brand::create([
            'name' => 'Cartier',
        ]);
        Brand::create([
            'name' => 'G-Shock',
        ]);
    }
}
