@extends('layouts.main')

@section('title', 'Category: ' . $category->name)

@section('content')
<!-- Title displaying the category name -->
<h1 class="my-4">Category: {{ $category->name }}</h1>

<!-- Loop through the articles in the category and display each one -->
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
@endsection
