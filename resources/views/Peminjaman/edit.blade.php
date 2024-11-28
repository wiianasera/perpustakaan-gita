<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <div class="container">
            <a href="{{ url('/') }}" class="brand">Perpustakaan</a>
            <ul class="nav-links">
                <li><a href="{{ route('peminjaman.index') }}">Data Peminjaman</a></li>
                <li><a href="{{ route('peminjaman.create') }}">Pinjam Buku</a></li>
                <li><a href="{{ route('buku.index') }}">Daftar Buku</a></li>
                
                @auth
                    <li>
                        <a href="#">{{ Auth::user()->name }}</a>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Perpustakaan. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>