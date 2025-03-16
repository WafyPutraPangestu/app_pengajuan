<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User 1',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('test12345'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('test12345'),
            'role' => 'user',
        ]);
    }
}
