<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Ganti password sesuai kebutuhan
        ]);
        
        User::create([
            'email' => 'kamal@gmail.com',
            'password' => Hash::make('kamal123'), // Ganti password sesuai kebutuhan
        ]);
    }
}
