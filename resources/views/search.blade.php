<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <h1>Search</h1>

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
