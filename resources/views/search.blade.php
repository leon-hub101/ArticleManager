@extends('layouts.main')

@section('title', 'Search')

@section('content')
<h1 class="my-4">Search</h1>

<!-- Instructions for users -->
<p>Use the search bars below to search for articles by ID, categories by name, or tags by name. The lists of categories
    and tags below show all available options that you can use for your search.</p>

<!-- Form for searching articles by ID -->
<form action="{{ route('search.article') }}" method="GET" class="mb-4">
    <div class="form-group">
        <label for="article_id">Search Article by ID:</label>
        <input type="text" id="article_id" name="id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-custom">Search</button>
</form>

<!-- Form for searching categories by name -->
<form action="{{ route('search.category') }}" method="GET" class="mb-4">
    <div class="form-group">
        <label for="category_name">Search Category by Name:</label>
        <input type="text" id="category_name" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-custom">Search</button>
</form>

<!-- Form for searching tags by name -->
<form action="{{ route('search.tag') }}" method="GET" class="mb-4">
    <div class="form-group">
        <label for="tag_name">Search Tag by Name:</label>
        <input type="text" id="tag_name" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-custom">Search</button>
</form>

<!-- Display error message if search item not found -->
@if(session('error'))
    <p class="text-danger">{{ session('error') }}</p>
@endif

<!-- List of all categories -->
<h2 class="my-4">Categories</h2>
<p>Below is a list of all available categories. Use these names in the search bar above to find articles by category.
</p>
<ul class="list-group mb-4">
    @foreach($categories as $category)
        <li class="list-group-item">{{ $category->name }}</li>
    @endforeach
</ul>

<!-- List of all tags -->
<h2 class="my-4">Tags</h2>
<p>Below is a list of all available tags. Use these names in the search bar above to find articles by tag.</p>
<ul class="list-group">
    @foreach($tags as $tag)
        <li class="list-group-item">{{ $tag->name }}</li>
    @endforeach
</ul>
@endsection
