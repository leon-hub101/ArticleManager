<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    // Run the database seeds for categories
    public function run()
    {
        // List of categories to seed
        $categories = [
            ['name' => 'Tech News', 'slug' => 'tech-news'],
            ['name' => 'Health', 'slug' => 'health'],
            ['name' => 'Finance', 'slug' => 'finance'],
            ['name' => 'Travel', 'slug' => 'travel'],
        ];

        // Create each category if it doesn't already exist
        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
