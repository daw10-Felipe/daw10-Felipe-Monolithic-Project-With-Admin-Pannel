<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Change.org</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #ff3030;
            color: white;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar-logo {
            font-weight: bold;
            font-size: 1.5rem;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .user-panel {
            padding: 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .user-panel:hover {
            background-color: rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .user-panel img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
            background-color: white;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
        }

        .sidebar-menu li a:hover, .sidebar-menu li a.active {
            background-color: rgba(0,0,0,0.1);
            border-left: 4px solid white;
        }

        .sidebar-menu .menu-header {
            padding: 10px 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            opacity: 0.7;
        }

        .main-wrapper {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background: white;
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .search-bar input {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            border: 1px solid #ddd;
            padding: 8px 20px;
            background-color: #f9f9f9;
        }

        .top-icons i {
            font-size: 1.2rem;
            color: #555;
            margin-left: 20px;
            cursor: pointer;
            position: relative;
            transition: color 0.2s;
        }

        .top-icons i:hover {
            color: #ff3030;
        }

        .badge-notification {
            position: absolute;
            top: -5px;
            right: -8px;
            font-size: 0.6rem;
            padding: 3px 5px;
            border-radius: 50%;
        }

        .content-container {
            padding: 30px;
            flex-grow: 1;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-logo">
        Change.org Admin
    </div>

    <a href="{{ route('profile.edit') }}" class="user-panel text-decoration-none text-white">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=fff&color=ff3030" alt="User">
        <div class="d-flex flex-column text-truncate">
            <span class="fw-bold">{{ Auth::user()->name ?? 'Usuario' }}</span>
            <small style="opacity: 0.8; font-size: 0.75rem;">Administrador</small>
        </div>
    </a>

    <ul class="sidebar-menu">
        <li class="menu-header">Gestión Principal</li>

        <li>
            <a href="{{ route('admin.home') }}" class="{{ request()->routeIs('admin.home') || request()->routeIs('adminpetitions.*') ? 'active' : '' }}">
                <i class="fas fa-file-signature me-2"></i> Peticiones
            </a>
        </li>

        <li>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-layer-group me-2"></i> Categorías
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Usuarios
            </a>
        </li>

        <li class="menu-header">Sistema</li>
        <li>
            <a href="{{ url('/?vistaprevia=true') }}" target="_blank">
                <i class="fas fa-external-link-alt me-2"></i> Ver Web Pública
            </a>
        </li>
    </ul>
</div>

<div class="main-wrapper">

    <header class="top-navbar">
        <div class="search-bar d-none d-md-block">
            <input type="text" placeholder="Buscar en panel...">
        </div>

        <div class="top-icons d-flex align-items-center ms-auto">
            <div class="position-relative">
                <i class="fas fa-bell"></i>
                <span class="badge bg-danger badge-notification">3</span>
            </div>

            <div class="dropdown ms-4">
                <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'A') }}&background=0D8ABC&color=fff" alt="" width="32" height="32" class="rounded-circle me-2">
                    <span class="d-none d-sm-inline fw-bold">{{ Auth::user()->name ?? 'Usuario' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser1">
                    <li><h6 class="dropdown-header">Hola, {{ Auth::user()->name ?? 'Usuario' }}</h6></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Mi Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="content-container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="bg-white text-center py-3 text-muted mt-auto border-top">
        <small>&copy; {{ date('Y') }} Change.org Clon - Panel de Control.</small>
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
