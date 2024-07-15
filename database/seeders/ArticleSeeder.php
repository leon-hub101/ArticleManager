<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    // Run the database seeds for articles
    public function run()
    {
        // Get all categories
        $categories = Category::all();

        // List of articles to seed with their respective tags
        $articles = [
            ['title' => 'The Future of AI', 'content' => 'Exploring the advancements in AI technology...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'tech-news')->first()->id, 'tags' => ['AI', 'Tech']],
            ['title' => 'Google’s Latest Innovations', 'content' => 'A look at the latest technologies from Google...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'tech-news')->first()->id, 'tags' => ['Google', 'Tech']],
            ['title' => 'High-Performance Computing in 2024', 'content' => 'The future of computing power...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'tech-news')->first()->id, 'tags' => ['High-Performance Computing', 'Tech']],
            ['title' => 'Understanding Singularity', 'content' => 'What is the technological singularity and how will it affect us...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'tech-news')->first()->id, 'tags' => ['Singularity', 'AI']],
            ['title' => 'Top Health Tips', 'content' => 'Essential tips for maintaining good health...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'health')->first()->id, 'tags' => ['Fitness', 'Health']],
            ['title' => 'Investing in 2024', 'content' => 'Best investment strategies for the coming year...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'finance')->first()->id, 'tags' => ['Investing', 'Finance']],
            ['title' => 'Adventure Travel Destinations', 'content' => 'Exciting places to explore...', 'creation_date' => now(), 'category_id' => $categories->where('slug', 'travel')->first()->id, 'tags' => ['Adventure', 'Travel']],
        ];

        // Create each article and attach specific tags
        foreach ($articles as $articleData) {
            // Extract tags from the article data
            $tags = $articleData['tags'];
            unset($articleData['tags']);

            // Create the article
            $article = Article::create($articleData);

            // Attach the relevant tags
            foreach ($tags as $tagName) {
                $tag = Tag::where('slug', strtolower(str_replace(' ', '-', $tagName)))->first();
                if ($tag) {
                    $article->tags()->attach($tag->id);
                }
            }
        }
    }
}
