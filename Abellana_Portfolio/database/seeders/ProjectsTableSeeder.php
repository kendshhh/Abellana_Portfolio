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
                'title' => 'Anti Corruption',
                'description' => 'A web application designed to report and track corruption incidents in public services.',
                'tech_stack' => 'Laravel,Vue.js,MySQL',
                'year' => '2023',
                'image_url' => 'images/projects/project1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tambayani',
                'description' => 'A community platform for sharing news and resources in local dialects.',
                'tech_stack' => 'React,Node.js,Express,MongoDB',
                'year' => '2022',
                'image_url' => 'images/projects/project2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trust Ledger',
                'description' => 'A blockchain-based ledger for verifying trust between organizations and individuals.',
                'tech_stack' => 'Solidity,Ethereum,JavaScript',
                'year' => '2024',
                'image_url' => 'images/projects/project3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
