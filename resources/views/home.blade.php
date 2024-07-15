<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    @extends('layouts.main')

    @section('title', 'Home')

    @section('content')
    <!-- Title for the latest articles section -->
    <h1>Latest Articles</h1>

    <!-- Loop through the articles and display each one -->
    @foreach($articles as $article)
        <div>
            <!-- Link to the individual article -->
            <h2><a href="{{ url('/article', $article->id) }}">{{ $article->title }}</a></h2>
            <!-- Display a preview of the article content -->
            <p>{{ Str::limit($article->content, 100, '...') }}</p>
        </div>
    @endforeach

    <!-- List of all categories -->
    <h2>Categories</h2>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ url('/category', $category->slug) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <!-- List of all tags -->
    <h2>Tags</h2>
    <ul>
        @foreach($tags as $tag)
            <li><a href="{{ url('/tag', $tag->slug) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
    @endsection
</body>

</html>
