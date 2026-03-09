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
                'description' => 'Developed full-stack web applications, led API integrations, and optimized performance.',
                'year' => '2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'role' => 'Executive Secretary',
                'organization' => 'Amazon Web Services Learning Club - USLS',
                'description' => 'Developed full-stack web applications, led API integrations, and optimized performance.',
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Class Mayor',
                'organization' => 'Classroom',
                'description' => 'Built responsive interfaces with accessibility in mind and collaborated with designers.',
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Budget and Finance Undersecretary',
                'organization' => 'Computer Science Society - USLS',
                'description' => 'Built responsive interfaces with accessibility in mind and collaborated with designers.',
                'year' => '2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
