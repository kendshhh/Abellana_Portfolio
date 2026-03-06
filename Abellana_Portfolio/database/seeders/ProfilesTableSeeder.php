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
        DB::table('profiles')->updateOrInsert(
            ['id' => 1],
            [
                'full_name' => 'Kendra Abellana',
                'title' => 'Full Stack Developer',
                'bio' => 'I build responsive and database-driven web applications using Laravel, Bootstrap, and modern frontend tools.',
                'email' => 'kendra.abellana@example.com',
                'location' => 'Bacolod City, Philippines',
                'image_url' => 'images/profile/kendra-profile.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
