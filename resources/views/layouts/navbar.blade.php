<header class="header mt-auto py-2" style="background-color: #350244">
    <div class="container">
        <span class="text-center d-block" style="color: #fff"><i class="bi bi-envelope-fill"></i>
            fmipaunsulbar@unsulbar.ac.id</span>
    </div>
</header>
<nav class="navbar navbar-expand-lg bg-navi navbar-dark">
    <div class="container">
        {{-- <a class="navbar-brand" href="/">REPOSITORY FMIPA</a> --}}
        <a href="/"><img src="{{ asset('assets/images/logorepo.png') }}" style="width: 250px" alt="Logo" srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Contact' ? 'active' : '' }}" href="/contact">Contact</a>
                </li>
            </ul> --}}

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @can('admin')
                                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endcan
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>

                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $title === 'Login' ? 'active' : '' }}">LOGIN</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
