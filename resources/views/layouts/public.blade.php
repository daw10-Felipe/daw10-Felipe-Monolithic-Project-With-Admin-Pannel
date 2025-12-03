<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monolitico de Change.org</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .dropdown-menu.show-manual {
            display: block !important;
            position: absolute;
            right: 0;
            left: auto;
            z-index: 9999;
        }
    </style>
</head>

<body>
<header>
    <div class="container-lg d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img class="icoHeader" src="{{ asset('src/ico.jpg') }}" alt="Change.org" />
            </a>

            <div class="collapse navbar-collapse custom-menu d-none d-lg-block" id="navbarNav">
                <ul class="navbar-nav d-flex flex-row gap-3">
                    @if(Auth::check())
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ route('petitions.index') }}">Mis peticiones</a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ route('petitions.petitionssigned') }}">Mis Firmas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Programa de socios/as</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/petitions/index">
                            <i class="fas fa-search mr-1"></i> Buscar peticiones
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">

            <a href="{{ route('petitions.edit-add') }}" class="btn btn-outline-secondary peticion mr-2 text-decoration-none">
                Inicia una petición
            </a>


            @if(Auth::check())
                <div class="position-relative ms-2">
                    <button onclick="toggleUserMenu()"
                            class="btn btn-link p-0 text-dark text-decoration-none d-flex align-items-center border-0 bg-transparent"
                            type="button"
                            id="userMenuBtn">
                        <i class="fas fa-user-circle profile-icon fa-lg"></i>
                        <span class="ms-1 fw-bold">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ms-1" style="font-size: 0.8rem;"></i>
                    </button>

                    <ul id="userDropdownMenu" class="dropdown-menu shadow mt-2" style="min-width: 200px;">
                        <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}">Mi Perfil</a></li>

                        <li class="d-lg-none"><a class="dropdown-item py-2" href="{{ route('petitions.index') }}">Mis Peticiones</a></li>

                        <li><a class="dropdown-item py-2" href="{{ route('petitions.petitionssigned') }}">Mis Firmas</a></li>

                        <li class="d-lg-none"><a class="dropdown-item py-2" href="/petitions/index">Buscar peticiones</a></li>

                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2 fw-bold">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="d-flex align-items-center">
                    <a href="{{ route('login') }}" class="btn btn-link text-dark text-decoration-none fw-bold">Entra</a>
                    <a href="{{ route('register') }}" class="btn btn-link text-dark text-decoration-none">Regístrate</a>
                </div>
            @endif

            @if(Auth::check())
                <button class="btn btn-link search-icon-btn mr-2 p-0 d-none" type="button">
                    <i class="fas fa-search"></i>
                </button>

                <button class="navbar-toggler p-0 d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <img src="{{ asset('src/burger.png') }}" alt="Menú" class="burger-icon" />
                </button>
            @endif

        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer pt-5 pb-3">
    <div class="container">
        <hr class="mb-5">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <h5>Acerca de</h5>
                <ul>
                    <li><a href="#">Sobre Change.org</a></li>
                    <li><a href="#">Impacto</a></li>
                    <li><a href="#">Empleo</a></li>
                    <li><a href="#">Equipo</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    function toggleUserMenu() {
        var menu = document.getElementById('userDropdownMenu');
        if (menu.classList.contains('show-manual')) {
            menu.classList.remove('show-manual');
        } else {
            menu.classList.add('show-manual');
        }
    }

    window.onclick = function(event) {
        if (!event.target.closest('#userMenuBtn')) {
            var menu = document.getElementById('userDropdownMenu');
            if (menu && menu.classList.contains('show-manual')) {
                menu.classList.remove('show-manual');
            }
        }
    }
</script>

</body>
</html>
