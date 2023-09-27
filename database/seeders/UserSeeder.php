<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models 
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stefano = [
            'name' => 'stefano',
            'email' => 'stefano1314@hotmail.it',
            'password' => 'password'
        ];

        User::truncate();

        User::create([
            'name' => $stefano['name'],
            'email' => $stefano['email'],
            'password' => Hash::make($stefano['password'])
        ]);
    }
}
