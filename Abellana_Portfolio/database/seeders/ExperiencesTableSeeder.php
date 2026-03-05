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
                'role' => 'Software Engineer',
                'organization' => 'Acme Corp',
                'description' => 'Developed full-stack web applications, led API integrations, and optimized performance.',
                'year' => '2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Frontend Developer',
                'organization' => 'Bright Studio',
                'description' => 'Built responsive interfaces with accessibility in mind and collaborated with designers.',
                'year' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
