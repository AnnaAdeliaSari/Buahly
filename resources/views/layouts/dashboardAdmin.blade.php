<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar {
            width: 250px;
            background-color: #1E3A8A;
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover { background-color: #3749ab; }
        .topbar {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .content { flex-grow: 1; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center py-4">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">Pengguna</a>
        <a href="{{ route('admin.products') }}">Produk</a>
        <a href="{{ route('admin.orders') }}">Transaksi</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 mt-4">Log Out</button>
        </form>
    </div>

    <div class="content">
        <div class="topbar">
            Selamat datang, {{ Auth::user()->name }} (Admin)
        </div>
        <div class="p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>