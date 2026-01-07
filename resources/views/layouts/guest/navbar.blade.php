<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/home') }}" class="navbar-brand p-0">
            <h1 class="text-primary"><img src="{{ asset('images/Logo.jpeg') }}" alt="Logo">
                Perangkat Dan Lembaga Desa</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/home') }}" class="nav-item nav-link">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('/perangkat')}}" class="nav-item nav-link">Perangkat Desa</a>
                <a href="{{ route('pages.perangkat.lembaga.index') }}" class="nav-item nav-link">Lembaga Desa</a>


                @auth
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                                <img src="{{ Auth::user()->photo
                    ? asset('images/users/' . Auth::user()->photo)
                    : 'https://cdn-icons-png.flaticon.com/128/17701/17701286.png' }}"
                                    style="width:24px; height:24px; object-fit:cover; border-radius:50%;" alt="User Photo">
                                Hello, {{ Auth::user()->name }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                @csrf
                            </form>

                            <a class="nav-item nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <a class="nav-item nav-link">
                                {{ session('last_login') }}
                            </a>
                @else
                    <li class="nav-item nav-link">
                        <a href="{{ route('auth') }}">Login</a>
                    </li>
                @endauth
            </div>
        </div>
    </nav>
