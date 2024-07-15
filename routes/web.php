<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
})->name('home');

// Article view route
Route::get('/article/{id}', function ($id) {
    $article = Article::with('category', 'tags')->findOrFail($id);
    return view('article', ['article' => $article]);
})->name('article.show');

// Category view route
Route::get('/category/{slug}', function ($slug) {
    $category = Category::where('slug', $slug)->firstOrFail();
    $articles = $category->articles;
    return view('category', ['category' => $category, 'articles' => $articles]);
})->name('category.show');

// Tag view route
Route::get('/tag/{slug}', function ($slug) {
    $tag = Tag::where('slug', $slug)->firstOrFail();
    $articles = $tag->articles;
    return view('tag', ['tag' => $tag, 'articles' => $articles]);
})->name('tag.show');

// Search page route
Route::get('/search', function () {
    $categories = Category::all();
    $tags = Tag::all();
    return view('search', ['categories' => $categories, 'tags' => $tags]);
})->name('search');

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

// Legal page route
Route::get('/legal', function () {
    return view('legal');
})->name('legal');


