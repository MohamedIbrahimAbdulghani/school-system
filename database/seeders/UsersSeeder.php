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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'Mohamed Ibrahim Abdulghani',
            'email' => 'mohamedibrahimabdulghani@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
