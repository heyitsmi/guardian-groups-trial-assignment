<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method will populate the 'badges' table with initial data.
     */
    public function run(): void
    {
        DB::table('badges')->insert([
            [
                'name' => 'First Mission',
                'icon' => '🌟',
                'short_description' => 'Awarded for completing your very first micro-help task.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Community Helper',
                'icon' => '🤝',
                'short_description' => 'Awarded after helping out 5 times in the community.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Welcome Committee',
                'icon' => '👋',
                'short_description' => 'Awarded for welcoming 3 new members to the platform.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Resource Guardian',
                'icon' => '✍️',
                'short_description' => 'Awarded for successfully reviewing or editing a resource page.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cheerleader',
                'icon' => '❤️',
                'short_description' => 'Awarded for reacting to 10 different posts or comments.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
