<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\GuardianGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuardianGroupMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = GuardianGroup::all();
        $users = User::where('email','!=','admin@gmail.com')->get();

        foreach ($users as $user) {
            // Randomly assign each user to a group
            $group = $groups->random();
            $group->members()->sync($user->id);
        }
    }
}
