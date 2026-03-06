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
        \DB::table('contacts')->updateOrInsert(
            ['profile_id' => 1, 'label' => 'Primary'],
            [
                'email' => 'kendra.abellana@example.com',
                'phone' => '+63 912 345 6789',
                'address' => 'Barangay 1',
                'city' => 'Bacolod City',
                'country' => 'Philippines',
                'linkedin_url' => 'https://www.linkedin.com/in/kendra-abellana',
                'github_url' => 'https://github.com/kendraabellana',
                'website_url' => 'https://kendraabellana.dev',
                'meta' => json_encode(['preferred_contact' => 'email']),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
