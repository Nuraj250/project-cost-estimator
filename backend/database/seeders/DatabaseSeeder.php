<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed a default user
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        Project::create([
        'name' => 'Demo Project',
        'assumed_hours' => 100,
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }
}
