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
                'required_points' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Community Helper',
                'icon' => '🤝',
                'short_description' => 'Awarded after helping out 5 times in the community.',
                'required_points' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Active Contributor',
                'icon' => '🚀',
                'short_description' => 'Awarded for reaching a total of 250 points.',
                'required_points' => 250,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Platform Pillar',
                'icon' => '🏛️',
                'short_description' => 'A sign of true dedication, awarded for reaching 1000 points.',
                'required_points' => 1000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
