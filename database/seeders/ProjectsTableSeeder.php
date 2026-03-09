<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // clear existing projects to avoid duplicates
        \DB::table('projects')->truncate();

        \DB::table('projects')->insert([
            [
                'title' => 'Anti-Corruption Procurement Monitoring System',
                'description' => 'A machine-learning–powered system that tracks procurement items, detects overpriced materials using marketplace data, ensures transparency, and motivates users through structured gamification elements to promote accuracy, timely reporting, and compliance.',
                'tech_stack' => 'PHP, MySQL, Bootstrap, CSS, JavaScript',
                'year' => '2026',
                'image_url' => 'images/projects/project1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tambayani',
                'description' => 'TamBayani is a community-based microjob platform designed to connect people in a local area with short-term tasks or gigs.

It allows unemployed youth, students, stay-at-home parents, and informal workers to find small jobs nearby, such as errands, tutoring, cleaning, or helping small businesses. At the same time, households, small businesses, and barangays can easily post tasks when they need help.

The goal of TamBayani is to turn idle time into productive opportunities, helping people earn income while supporting their local community.',
                'tech_stack' => 'PHP, MySQL, Bootstrap, CSS, JavaScript',
                'year' => '2025',
                'image_url' => 'images/projects/project3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trust Ledger',
                'description' => 'The system acts as a digital ledger that automatically calculates your fathers net balance by tracking every deposit and withdrawal you enter. It ensures complete transparency by assigning unique reference IDs to transactions and requiring a detailed narrative to explain the purpose of each move. All data is stored locally in your browser, providing a professional, high-contrast dashboard for real-time financial oversight.',
                'tech_stack' => 'PHP, MySQL, Bootstrap, CSS, JavaScript',
                'year' => '2024',
                'image_url' => 'images/projects/project2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
