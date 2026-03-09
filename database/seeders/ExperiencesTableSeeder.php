<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('experiences')->insert([
            [
                'role' => 'Vice Mayor',
                'organization' => 'Classroom',
                'description' => 'Assists the Classroom Mayor in leading the class, coordinating activities, and ensuring that classroom responsibilities are fulfilled.',
                'year' => '2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'role' => 'Executive Secretary',
                'organization' => 'Amazon Web Services Learning Club - USLS',
                'description' => 'Manages documentation, records meeting minutes, and handles official communications for the learning club.',
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Class Mayor',
                'organization' => 'Classroom',
                'description' => 'Leads the class by representing students, organizing activities, and ensuring coordination between classmates and teachers.',
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Budget and Finance Undersecretary',
                'organization' => 'Computer Science Society - USLS',
                'description' => 'Supports the finance team in managing budgets, tracking expenses, and assisting in financial planning for organizational activities.',
                'year' => '2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
