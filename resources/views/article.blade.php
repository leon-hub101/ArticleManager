@extends('layouts.main')

@section('title', $article->title)

@section('content')
    <!-- Display the article title -->
    <h1 class="my-4">{{ $article->title }}</h1>

    <!-- Display the category of the article -->
    <p><strong>Category:</strong> {{ $article->category->name }}</p>

    <!-- Display the tags associated with the article -->
    <p><strong>Tags:</strong>
        @foreach($article->tags as $tag)
            <span class="badge badge-primary">{{ $tag->name }}</span>
        @endforeach
    </p>

    <!-- Display the creation date of the article -->
    <p><strong>Created on:</strong> {{ $article->creation_date }}</p>

    <!-- Display the content of the article -->
    <div>{{ $article->content }}</div>
@endsection
