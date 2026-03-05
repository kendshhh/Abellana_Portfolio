<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('educations')->insert([
            [
                'profile_id' => 1,
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Computer Science',
                'institution' => 'State University',
                'start_year' => 2016,
                'end_year' => 2020,
                'grade' => '3.8 GPA',
                'description' => 'Focused on software engineering, data structures, and web development.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
