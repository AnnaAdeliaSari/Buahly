<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">🍓 Buahly</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navBar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>

                <!-- Link Pesanan Berdasarkan Role -->
                <li class="nav-item">
                    @auth
                        @if(auth()->user()->role == 'petani')
                            <a class="nav-link" href="{{ url('/petani/pesanan') }}">Pesanan</a>
                        @elseif(auth()->user()->role == 'pembeli')
                            <a class="nav-link" href="{{ url('/pesanan') }}">Pesanan</a>
                        @elseif(auth()->user()->role == 'admin')
                            <a class="nav-link" href="{{ url('/admin/pesanan') }}">Pesanan</a>
                        @endif
                    @else
                        <a class="nav-link" href="/login">Pesanan</a>
                    @endauth
                </li>

                <!-- Login/Logout -->
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link text-decoration-none" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
