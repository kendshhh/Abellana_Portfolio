<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('skills')->insert([
            ['name' => 'HTML', 'level' => 'Beginner', 'percent' => 45],
            ['name' => 'CSS', 'level' => 'Beginner', 'percent' => 25],
            ['name' => 'JavaScript', 'level' => 'Beginner', 'percent' => 15],
            ['name' => 'PHP', 'level' => 'Beginner', 'percent' => 45],
            ['name' => 'Laravel', 'level' => 'Beginner', 'percent' => 35],
        ]);
    }
}
