<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use Database\Factories\DepartmentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Department::factory(6)->create();
         \App\Models\Employee::factory(25)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@email.com',
         ]);
    }
}
