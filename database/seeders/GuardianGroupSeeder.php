<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'zip_code' => '12345',
                'group_name' => 'Group A',
                'status' => 'active',
            ],
            [
                'zip_code' => '67890',
                'group_name' => 'Group B',
                'status' => 'inactive',
            ],
            [
                'zip_code' => '54321',
                'group_name' => 'Group C',
                'status' => 'active',
            ],
            [
                'zip_code' => '09876',
                'group_name' => 'Group D',
                'status' => 'active',
            ],
            [
                'zip_code' => '11223',
                'group_name' => 'Group E',
                'status' => 'inactive',
            ],
            [
                'zip_code' => '44556',
                'group_name' => 'Group F',
                'status' => 'active',
            ],
            [
                'zip_code' => '77889',
                'group_name' => 'Group G',
                'status' => 'active',
            ],
            [
                'zip_code' => '10101',
                'group_name' => 'Group H',
                'status' => 'inactive',
            ],
            [
                'zip_code' => '20202',
                'group_name' => 'Group I',
                'status' => 'active',
            ],
            [
                'zip_code' => '30303',
                'group_name' => 'Group J',
                'status' => 'active',
            ]
        ];

        foreach ($groups as $group) {
            \App\Models\GuardianGroup::create($group);
        }
    }
}
