<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('skills')->insert([
            ['name' => 'HTML', 'level' => 'Beginner'],
            ['name' => 'CSS', 'level' => 'Beginner'],
            ['name' => 'JavaScript', 'level' => 'Beginner'],
            ['name' => 'PHP', 'level' => 'Beginner'],
            ['name' => 'Laravel', 'level' => 'Beginner'],
        ]);
    }
}
