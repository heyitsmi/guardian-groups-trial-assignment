<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\GuardianGroup;
use Illuminate\Database\Seeder;

class GuardianGroupMemberSeeder extends Seeder
{
    public function run(): void
    {
        $guardianGroupIds = GuardianGroup::pluck('id');

        if ($guardianGroupIds->isEmpty()) {
            $this->command->info('No Guardian Groups found. Seeding users without assigning them to groups.');
            User::factory(50)->create();
            return;
        }

        User::factory(50)->create()->each(function (User $user) use ($guardianGroupIds) {
            $groupsToJoin = $guardianGroupIds->random(rand(1, min(3, $guardianGroupIds->count())));

            $user->groups()->attach($groupsToJoin);
        });
    }
}
