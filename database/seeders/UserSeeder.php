<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'role' => 'superAdmin',
        //     'password' => Hash::make('password'),
        // ]);
        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@admin.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Alhafar',
            'email' => 'alhafar@alhafar.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
