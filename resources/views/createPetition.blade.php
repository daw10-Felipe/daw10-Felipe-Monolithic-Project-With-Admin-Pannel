<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
</head>

<body class="page-create-petition">
<header>
    <div
        class="container-lg d-flex justify-content-between align-items-center"
    >
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

            <button
                class="btn btn-link search-icon-btn mr-2 p-0 d-lg-none"
                type="button"
            >
                <i class="fas fa-search"></i>
            </button>

            <button
                class="navbar-toggler p-0 d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <img src="/src/burger.png" alt="Menú" class="burger-icon" />
            </button>
        </div>
    </div>
</header>

<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2 class="petition-step-title text-center">
                    Primero, cuéntanos sobre tu causa
                </h2>
                <p class="petition-step-subtitle text-center">
                    Combinaremos tus palabras con nuestra experiencia para crearte el
                    borrador de petición más impactante.
                </p>

                <div class="form-group text-start mt-4">
                    <label for="petitionCause" class="form-label petition-form-label"
                    >Quiero...</label
                    >
                    <textarea
                        class="form-control petition-textarea"
                        id="petitionCause"
                        rows="5"
                        placeholder="Exigir que todos los edificios públicos de Sacramento, California, sean accesibles para sillas de ruedas."
                    ></textarea>
                </div>
            </div>
        </div>
    </div>

    <hr class="petition-separator" />

    <div class="container my-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2 class="petition-step-title text-center">Una última cosa</h2>
                <p class="petition-step-subtitle text-center">
                    Añadir una historia personal hará que la petición sea más sólida.
                </p>

                <div class="form-group text-start mt-4">
                    <label
                        for="personalStory"
                        class="form-label petition-form-label"
                    >¿Por qué es personal para ti? (Opcional)</label
                    >
                    <textarea
                        class="form-control petition-textarea"
                        id="personalStory"
                        rows="5"
                        placeholder="No hay rampas para que mi hermana pueda llegar a su aula en la escuela primaria Washington"
                    ></textarea>
                </div>

                <div
                    class="petition-button-group mt-4 d-flex justify-content-between"
                >
                    <button class="btn petition-btn-back">Volver</button>
                    <button class="btn petition-btn-continue">Continuar</button>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="site-footer pt-5 pb-3">
    <div class="container">
        <hr class="mb-5" />

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
