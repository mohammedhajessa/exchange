<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'admin')->get();

        $branches = [
            [
                'name' => 'Downtown Branch',
                'country' => 'United States',
                'city' => 'New York',
                'town' => 'Manhattan',
                'address' => '123 Wall Street',
                'phone' => '+1-212-555-0123',
                'start_time' => '2024-01-01',
                'end_time' => '2024-12-31',
                'user_id' => 1,
            ],
            [
                'name' => 'West Side Branch',
                'country' => 'United States',
                'city' => 'Los Angeles',
                'town' => 'Santa Monica',
                'address' => '456 Ocean Avenue',
                'phone' => '+1-310-555-0124',
                'start_time' => '2024-01-01',
                'end_time' => '2024-12-31',
                'user_id' => 2,
            ],
        ];
        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
