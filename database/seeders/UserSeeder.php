<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'admin123',
            'phoneNumber'=>'081234567890',
            'profilePicture'=>'assets/adminProfilePicture.jpg',
            'points'=>0,
            'role'=>'admin'
        ]);
    }
}
