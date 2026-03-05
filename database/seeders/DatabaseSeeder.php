<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProfilesTableSeeder::class,
            SkillsTableSeeder::class,
            ExperiencesTableSeeder::class,
            ProjectsTableSeeder::class,
            EducationsTableSeeder::class,
            ContactsTableSeeder::class,
        ]);
    }
}
