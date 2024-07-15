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

// Search page route
Route::get('/search', function () {
    return view('search');
});

// Search functionality routes
Route::get('/search/article', function (Request $request) {
    $article = Article::find($request->id);
    if ($article) {
        return redirect()->route('article.show', ['id' => $article->id]);
    } else {
        return redirect()->route('search')->with('error', 'Article not found');
    }
})->name('search.article');

Route::get('/search/category', function (Request $request) {
    $category = Category::where('name', $request->name)->first();
    if ($category) {
        return redirect()->route('category.show', ['slug' => $category->slug]);
    } else {
        return redirect()->route('search')->with('error', 'Category not found');
    }
})->name('search.category');

Route::get('/search/tag', function (Request $request) {
    $tag = Tag::where('name', $request->name)->first();
    if ($tag) {
        return redirect()->route('tag.show', ['slug' => $tag->slug]);
    } else {
        return redirect()->route('search')->with('error', 'Tag not found');
    }
})->name('search.tag');
