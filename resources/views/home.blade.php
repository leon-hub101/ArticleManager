@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <!-- Title for the latest articles section -->
    <h1 class="my-4">Latest Articles</h1>

    <!-- Loop through the articles and display each one -->
    @foreach($articles as $article)
        <div class="card mb-4">
            <div class="card-body">
                <!-- Link to the individual article -->
                <h2 class="card-title"><a href="{{ url('/article', $article->id) }}">{{ $article->title }}</a></h2>
                <!-- Display a preview of the article content -->
                <p class="card-text">{{ Str::limit($article->content, 100, '...') }}</p>
            </div>
        </div>
    @endforeach

    <!-- List of all categories -->
    <h2 class="my-4">Categories</h2>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">{{ $category->name }}</li>
        @endforeach
    </ul>

    <!-- List of all tags -->
    <h2 class="my-4">Tags</h2>
    <ul class="list-group">
        @foreach($tags as $tag)
            <li class="list-group-item">{{ $tag->name }}</li>
        @endforeach
    </ul>
@endsection
