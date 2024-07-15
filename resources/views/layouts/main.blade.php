<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Article Management App')</title>
</head>
<body>
    @yield('content')

    <!-- Include cookie notice -->
    @include('components.cookie-notice')

    <!-- Include footer -->
    @include('components.footer')
</body>
</html>
