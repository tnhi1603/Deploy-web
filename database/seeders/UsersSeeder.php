<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Nguyễn Văn B',
            'email' => 'staffA@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'managerA@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        User::factory(10)->create();
        
    }
}
