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
                'institution' => 'University of St. La Salle',
                'start_year' => 2023,
                'end_year' => null,
                'grade' => '--',
                'description' => 'Taking Computer Science focuses on learning programming, algorithms, and software development while developing strong problem-solving and analytical skills for careers in the technology industry.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile_id' => 1,
                'degree' => 'Science, Technology, Engineering, and Mathematics (STEM) Strand',
                'field_of_study' => 'Medical Science',
                'institution' => 'University of St. La Salle',
                'start_year' => 2021,
                'end_year' => 2023,
                'grade' => '--',
                'description' => 'Taking the Science, Technology, Engineering, and Mathematics (STEM) strand provides students with a strong foundation in science, mathematics, and technology while developing critical thinking and problem-solving skills for technology-related careers.',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile_id' => 1,
                'degree' => 'High School',
                'field_of_study' => 'Information and Communications Technology (ICT) Specialization',
                'institution' => 'Silay Institute Inc.',
                'start_year' => 2017,
                'end_year' => 2021,
                'grade' => '--',
                'description' => 'Taking the Information and Communications Technology (ICT) specialization in high school focuses on developing foundational skills in computer systems, programming, and digital technologies used in modern industries.',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
