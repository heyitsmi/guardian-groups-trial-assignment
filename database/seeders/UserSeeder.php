<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
