<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('missions')->insert([
            [
                'title' => 'Answer an Unanswered Question',
                'description' => 'Find a question in the forums that has no replies yet and share your knowledge.',
                'icon' => '💬',
                'points_reward' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Welcome a New User',
                'description' => 'Visit the introductions thread and leave a welcoming comment for a new member.',
                'icon' => '👋',
                'points_reward' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Review a Resource Entry',
                'description' => 'Help us keep our information accurate by reviewing a resource page for outdated links.',
                'icon' => '✍️',
                'points_reward' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'React to a Lonely Thread',
                'description' => 'Find a post in the "Anybody There?" category and give it a supportive reaction.',
                'icon' => '❤️',
                'points_reward' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
