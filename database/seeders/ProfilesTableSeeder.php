<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'full_name' => 'Kendra Abellana',
            'title' => 'Full Stack Developer',
            'bio' => 'Welcome to my portfolio',
            'email' => 'your-email@example.com',
            'location' => 'Your Location',
            'image_url' => 'images/profile/kendra-profile.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
