<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        //création des ADMIN
        User::create([
            'firstName' => 'Jordan',
            'lastName'  => 'Nsadisi',
            'email'     => 'astro@test.com',
            'password'  => Hash::make('admin123'),
            'role'      => 'ADMIN',
        ]);

        User::create([
            'firstName' => 'Monsieur',
            'lastName'  => 'Mukanza',
            'email'     => 'admin@test.com',
            'password'  => Hash::make('admin123'),
            'role'      => 'ADMIN',
        ]);
    }
}
