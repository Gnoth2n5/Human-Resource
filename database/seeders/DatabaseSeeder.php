<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Department::factory(5)->create();
        \App\Models\User::factory(50)->create();
        \App\Models\Jobs::factory(100)->create();

        \App\Models\User::factory()->create([
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_role' => 1,
        ]);
        \App\Models\User::factory()->create([
            'full_name' => 'Test',
            'email' => 'user@gmail.com',
        ]);
    }
}
