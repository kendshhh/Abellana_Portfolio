<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('contacts')->insert([
            [
                'profile_id' => 1,
                'label' => 'Primary',
                'email' => 'kendra.abellana@example.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Main St',
                'city' => 'Hometown',
                'country' => 'Countryland',
                'linkedin_url' => 'https://www.linkedin.com/in/yourprofile',
                'github_url' => 'https://github.com/yourusername',
                'website_url' => 'https://yourportfolio.example',
                'meta' => json_encode(['preferred_contact' => 'email']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
