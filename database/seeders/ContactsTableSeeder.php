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
                'email' => 'kendra.abellana@icloud.com',
                'phone' => '+63 9453956971',
                'address' => 'Rizal Proper',
                'city' => 'Silay City',
                'country' => 'Philippines',
                'linkedin_url' => 'https://www.linkedin.com/in/kendra-lynne-abellana-8172bb246/',
                'github_url' => 'https://github.com/kendshhh',
                'website_url' => '--',
                'meta' => json_encode(['preferred_contact' => 'email']),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
