<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Article Management App')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for pastel colors -->
    <style>
        body {
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar,
        .footer {
            background-color: #e3f2fd;
        }

        .content-wrapper {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 80px;
            /* Ensure there's space for the footer */
            flex: 1;
        }

        .header,
        .footer p,
        .header p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #007bff;
        }

        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">Article Management App</a>
    </nav>

    <div class="container mt-4">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Include cookie notice -->
    @include('components.cookie-notice')

    <!-- Include footer -->
    @include('components.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
