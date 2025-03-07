<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'owner', 'email' => 'owner@gmail.com', 'status' => 'active', 'role' => 'owner', 'password' => 'Owner12345']);
    }
}
