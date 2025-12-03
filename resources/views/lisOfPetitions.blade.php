<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
<header>
    <div class="container-lg d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="index.html" class="navbar-brand">
                <img class="icoHeader" src="src/ico.jpg" alt="iconoPrincipal" />
            </a>

            <div class="collapse navbar-collapse custom-menu" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">Mis peticiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Programa de socios/as</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-search d-none d-lg-inline-block mr-1"></i>
                            Buscar
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">Entra o regístrate</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <button class="btn btn-outline-secondary peticion mr-2">
                Inicia una petición
            </button>

            <a href="#" class="btn btn-link p-0 d-none d-lg-block ml-2">
                <i class="fas fa-user-circle profile-icon"></i>
            </a>

            <button class="btn btn-link search-icon-btn mr-2 p-0 d-lg-none" type="button">
                <i class="fas fa-search"></i>
            </button>

            <button class="navbar-toggler p-0 d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <img src="/src/burger.png" alt="Menú" class="burger-icon" />
            </button>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="tituloListPetitions">Descubre tu próxima causa</h2>
                <p class="parrafoListPetitions">Explora millones de peticiones y encuentra las que te interesan</p>
            </div>

            <div style="padding-bottom: 70px;" class="col-lg-8 offset-lg-2 col-12">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <input placeholder="🔎 Buscar peticiones" type="text"
                               class="form-control inputTextoListPetitions">
                    </div>
                    <div class="d-none d-md-block col-3">
                        <button class="w-100 buttonAmarillo2">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div style="padding-bottom: 70px;" class="row">
                    <div class="col-12">
                        <h2 class="subtitulosDescubre">Explorar</h2>
                    </div>
                    <div class="col-12">
                        <div class="row d-flex align-items-center text-center">
                            <div class="col-sm-6 col-md-4">
                                <button class="botonesList shadow-sm">
                                    <img src="src/ubi.png" alt="">
                                    <p>Cerca de ti</p>
                                </button>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <button class="botonesList shadow-sm">
                                    <img src="src/inversiones.png" alt="">
                                    <p>Populares</p>
                                </button>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <button class="botonesList shadow-sm">
                                    <img src="src/ubicacion.png" alt="">
                                    <p>Victorias</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 130px;" class="row">
                    <div class="col-12">
                        <h2 class="subtitulosDescubre">Temas</h2>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Políticas Públicas</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Política y Gobierno</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Educación</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Bienestar y Salud</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Gobierno Local</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Justicia Penal</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Bienestar de Familias y
                                Niños</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Justicia Económica</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Medioambiente</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Gobierno Nacional</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Negocios y Economía</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Entretenimiento y
                                Medios</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Derechos de los
                                Animales</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Conservación y Derechos de
                                los Animales</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Corrupción</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Bienestar de los
                                Animales</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Cuestiones
                                Estudiantiles</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Salud Pública</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Derechos de los Niños</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Discapacidad</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Deportes</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Tecnología</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Gobierno Regional</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Derechos de las Mujeres</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Acceso a Atención
                                Médica</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Derechos de los
                                Pacientes</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Medio Ambiente</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Debido Proceso</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Elecciones y Derechos de
                                los Votantes</a>
                            <a href="#" class="btn btn-outline-primary custom-topic-btn">Prevención de Delitos</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
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

            <div class="col-md-6 col-lg-3 mb-4">
                <h5>Comunidad</h5>
                <ul>
                    <li><a href="#">Prensa</a></li>
                    <li><a href="#">Normas de la Comunidad</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <h5>Ayuda</h5>
                <ul>
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="#">Guías</a></li>
                    <li><a href="#">Privacidad</a></li>
                    <li><a href="#">Términos</a></li>
                    <li><a href="#">Declaración de accesibilidad</a></li>
                    <li><a href="#">Política de cookies</a></li>
                    <li><a href="#">Gestionar cookies</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <h5>Redes sociales</h5>
                <ul>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">TikTok</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>



</body>

</html>
