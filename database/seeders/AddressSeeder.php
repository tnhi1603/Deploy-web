<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\default_address;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Process::run('php artisan vietnamzone:import');

        foreach(User::all() as $user) {
            $province = Province::all()->random();
            $district = District::where('province_id', $province->id)->get()->random();
            $ward = Ward::where('district_id', $district->id)->get()->random();

            $address = Address::create([
                'province' => $province->name,
                'district' => $district->name,
                'ward' => $ward->name,
                'user_id' => $user->id,
                'phone_number' => fake()->numerify('0#########'),
                'address' => 'số 1 Đường 1'
                
            ]);

            default_address::create([
                'user_id' => $user->id,
                'address_id' => $address->id,
            ]);
        }

    }
}
