<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

// Home route to display the latest 5 articles, all tags, and all categories
Route::get('/', function () {
    $articles = Article::latest()->take(5)->get();
    $categories = Category::all();
    $tags = Tag::all();
    return view('home', [
        'articles' => $articles,
        'categories' => $categories,
        'tags' => $tags
    ]);
});

// Article view route
Route::get('/article/{id}', function ($id) {
    // Find the article by ID, with its category and tags
    $article = Article::with('category', 'tags')->findOrFail($id);
    return view('article', ['article' => $article]);
});

// Category view route
Route::get('/category/{slug}', function ($slug) {
    // Find the category by slug
    $category = Category::where('slug', $slug)->firstOrFail();
    // Get articles under this category
    $articles = $category->articles;
    return view('category', ['category' => $category, 'articles' => $articles]);
});

// Tag view route
Route::get('/tag/{slug}', function ($slug) {
    // Find the tag by slug
    $tag = Tag::where('slug', $slug)->firstOrFail();
    // Get articles associated with this tag
    $articles = $tag->articles;
    return view('tag', ['tag' => $tag, 'articles' => $articles]);
});

// Legal page route
Route::get('/legal', function () {
    return view('legal');
});

/* Default welcome page
Route::get('/welcome', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
*/
