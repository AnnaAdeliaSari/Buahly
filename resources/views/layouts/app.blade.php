<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Jual Buah')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
        }
        .navbar {
            background: linear-gradient(to right, #4caf50, #81c784);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        footer {
            background-color: #4caf50;
            color: white;
            padding: 15px 0;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
