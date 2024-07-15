<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category: {{ $category->name }}</title>
</head>

<body>
    @extends('layouts.main')

    @section('title', 'Category: ' . $category->name)

    @section('content')
    <!-- Title displaying the category name -->
    <h1>Category: {{ $category->name }}</h1>

    <!-- Loop through the articles in the category and display each one -->
    @foreach($articles as $article)
        <div>
            <!-- Link to the individual article -->
            <h2><a href="{{ url('/article', $article->id) }}">{{ $article->title }}</a></h2>
            <!-- Display a preview of the article content -->
            <p>{{ Str::limit($article->content, 100, '...') }}</p>
        </div>
    @endforeach
    @endsection
</body>

</html>
