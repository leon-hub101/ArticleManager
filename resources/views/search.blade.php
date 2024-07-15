<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    @extends('layouts.main')

    @section('title', 'Search')

    @section('content')
    <h1>Search</h1>

    <!-- Instructions for users -->
    <p>Use the search bars below to search for articles by ID, categories by name, or tags by name. The lists of
        categories and tags below show all available options that you can use for your search.</p>

    <!-- Form for searching articles by ID -->
    <form action="{{ route('search.article') }}" method="GET">
        <label for="article_id">Search Article by ID:</label>
        <input type="text" id="article_id" name="id" required>
        <button type="submit">Search</button>
    </form>

    <!-- Form for searching categories by name -->
    <form action="{{ route('search.category') }}" method="GET">
        <label for="category_name">Search Category by Name:</label>
        <input type="text" id="category_name" name="name" required>
        <button type="submit">Search</button>
    </form>

    <!-- Form for searching tags by name -->
    <form action="{{ route('search.tag') }}" method="GET">
        <label for="tag_name">Search Tag by Name:</label>
        <input type="text" id="tag_name" name="name" required>
        <button type="submit">Search</button>
    </form>

    <!-- Display error message if search item not found -->
    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <!-- List of all categories -->
    <h2>Categories</h2>
    <p>Below is a list of all available categories. Use these names in the search bar above to find articles by
        category.</p>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <!-- List of all tags -->
    <h2>Tags</h2>
    <p>Below is a list of all available tags. Use these names in the search bar above to find articles by tag.</p>
    <ul>
        @foreach($tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    @endsection
</body>

</html>
