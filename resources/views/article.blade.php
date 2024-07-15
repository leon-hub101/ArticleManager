<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
</head>
<body>
    <!-- Display the article title -->
    <h1>{{ $article->title }}</h1>

    <!-- Display the category of the article -->
    <p><strong>Category:</strong> {{ $article->category->name }}</p>

    <!-- Display the tags associated with the article -->
    <p><strong>Tags:</strong>
        @foreach($article->tags as $tag)
            <a href="{{ url('/tag', $tag->slug) }}">{{ $tag->name }}</a>
        @endforeach
    </p>

    <!-- Display the creation date of the article -->
    <p><strong>Created on:</strong> {{ $article->creation_date }}</p>

    <!-- Display the content of the article -->
    <div>{{ $article->content }}</div>
</body>
</html>
