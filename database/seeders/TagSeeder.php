<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    // Run the database seeds for tags
    public function run()
    {
        // List of tags to seed
        $tags = [
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'Google', 'slug' => 'google'],
            ['name' => 'High-Performance Computing', 'slug' => 'high-performance-computing'],
            ['name' => 'Singularity', 'slug' => 'singularity'],
            ['name' => 'Investing', 'slug' => 'investing'],
            ['name' => 'Adventure', 'slug' => 'adventure'],
            ['name' => 'Tech', 'slug' => 'tech'],
            ['name' => 'Health', 'slug' => 'health'],
            ['name' => 'Finance', 'slug' => 'finance'],
            ['name' => 'Travel', 'slug' => 'travel'],
        ];

        // Create each tag if it doesn't already exist
        foreach ($tags as $tag) {
            Tag::firstOrCreate(['slug' => $tag['slug']], $tag);
        }
    }
}
