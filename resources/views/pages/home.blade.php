
@extends('layouts.public');

@section('content')
    <main class="main-content">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="TextoGrandeLanding">
                        El cambio comienza aquí <span style="color: red">.</span>
                    </p>
                </div>
                <div class="col-12 text-center mt-3">
                    <p class="TextoSecundarioLanding">
                        Únete a <b>567.092.370</b> personas que están impulsando un cambio
                        real en sus comunidades.
                    </p>
                </div>

                <div class="col-12 text-center mt-4">
                    <button class="buttonAmarillo">Crear una petición</button>
                    <button class="buttonBlanco">Comenzar con IA</button>
                </div>
            </div>
        </div>

        <div class="petition-item petition-1">
            <img src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="Petición 1" />
            <p class="petition-title">¡Victoria!</p>
            <p class="petition-count">157.929 Firmas</p>
        </div>
        <div class="petition-item petition-2">
            <img src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="Petición 2" />
            <p class="petition-title">¡Victoria!</p>
            <p class="petition-count">103.846 Firmas</p>
        </div>
        <div class="petition-item petition-3">
            <img src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="Petición 3" />
            <p class="petition-title">¡Victoria!</p>
            <p class="petition-count">96.241 Firmas</p>
        </div>
        <div class="petition-item petition-4">
            <img src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="Petición 4" />
            <p class="petition-title">En tendencia</p>
            <p class="petition-count">192.202 Firmas</p>
        </div>
        <div class="petition-item petition-5">
            <img src="https://static.change.org/homepageV3/img/desiderioysoledad_los3%20(1).jpg" alt="Petición 5" />
            <p class="petition-title">¡Victoria!</p>
            <p class="petition-count">141.337 Firmas</p>
        </div>
        <div id="carouselEx" class="carousel slide carousel-dark bg-transparent carruselMovil">
            <div class="carousel-inner px-5 bg-transparent">
                <div class="carousel-item active card text-center bg-transparent">
                    <img src="src/carousel1.jpg" class="card-img-top rounded-circle mx-auto mt-3"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="card-body px-4 text-center bg-transparent">
                        <h5 class="card-title">🔴 ¡Victoria!</h5>
                        <h6> 157.929 firmas</h6>

                    </div>
                </div>
                <div class="carousel-item card text-center bg-transparent">
                    <img src="src/carousel2.jpg" class="card-img-top rounded-circle mx-auto mt-3"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="card-body px-4 text-center bg-transparent">
                        <h5 class="card-title">🔴 ¡Victoria!</h5>
                        <h6> 96.241 firmas</h6>
                    </div>
                </div>
                <div class="carousel-item  card text-center bg-transparent">
                    <img src="src/carousel3.jpg" class="card-img-top rounded-circle mx-auto mt-3"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="card-body px-4 text-center bg-transparent">
                        <h5 class="card-title">🔴 ¡Victoria!</h5>
                        <h6> 141.337 firmas</h6>
                    </div>
                </div>
                <div class="carousel-item  card text-center bg-transparent">
                    <img src="src/carousel4.jpg" class="card-img-top rounded-circle mx-auto mt-3"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="card-body px-4 text-center bg-transparent">
                        <h5 class="card-title">🔴 ¡Victoria!</h5>
                        <h6> 192.190 firmas</h6>
                    </div>
                </div>
                <div class="carousel-item  card text-center bg-transparent">
                    <img src="src/carousel5.jpg" class="card-img-top rounded-circle mx-auto mt-3"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="card-body px-4 text-center bg-transparent">
                        <h5 class="card-title">🔴 ¡Victoria!</h5>
                        <h6> 162.856 firmas</h6>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev bg-transparent" type="button" data-bs-target="#carouselEx"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next bg-transparent" type="button" data-bs-target="#carouselEx"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>
    <aside class="container-fluid landingDiv2 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2>Usar la plataforma de peticiones n.º 1 del mundo es fácil</h2>
                </div>

                <div class="col-md-4 text-md-center img-fluid">
                    <img src="src/numero-uno.png" alt="Paso 1" class="numAsideImg">
                    <b class="d-md-none">Crea una petición en dos minutos</b>
                    <p class="d-md-none">Más de 2.000 nuevas cada día</p>
                </div>

                <div class="col-md-4 text-md-center img-fluid">
                    <img src="src/numero-2.png" alt="Paso 2" class="numAsideImg">
                    <b class="d-md-none">Consigue apoyo gracias a nuestra gran comunidad</b>
                    <p class="d-md-none">Más de 500.000 firmas diarias</p>
                </div>

                <div class="col-md-4 text-md-center img-fluid">
                    <img src="src/numero-3.png" alt="Paso 3" class="numAsideImg">
                    <b class="d-md-none">Llega hasta los responsables gracias a nuestra red</b>
                    <p class="d-md-none">Más de 1.000 notificados a diario</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-none d-md-block">
                    <b>Crea una petición en dos minutos</b>
                    <p>Más de 2.000 nuevas cada día</p>
                </div>
                <div class="col-md-4 text-center d-none d-md-block">
                    <b>Consigue apoyo gracias a nuestra gran comunidad</b>
                    <p>Más de 500.000 firmas diarias</p>
                </div>
                <div class="col-md-4 text-center d-none d-md-block">
                    <b>Llega hasta los responsables gracias a nuestra red</b>
                    <p>Más de 1.000 notificados a diario</p>
                </div>
            </div>
            <div class="col-12 text-center mb-4">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Lee nuestros consejos y guías sobre cómo crear una petición
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Cómo iniciar una petición</a></li>
                        <li><a class="dropdown-item" href="#">Cómo recolectar firmas</a></li>
                        <li><a class="dropdown-item" href="#">Cómo hacer ruido con tu campaña</a></li>
                        <li><a class="dropdown-item" href="#">Cómo llegar a los medios</a></li>
                        <li><a class="dropdown-item" href="#">Cómo contactar con los responsables</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <aside>
        <div class="container">
            <div class="row">

                <div class="col-12 h2Causas">
                    <h2>Apoya causas que te importan</h2>
                    <p>Encuentra peticiones que te conmuevan y alza tu voz para lograr el cambio.
                    </p>
                </div>

                <div class="col-12 mb-3">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            Sanidad →
                        </a>

                        <a href="#" class="btn btn-outline-primary">
                            Animales →
                        </a>

                        <a href="#" class="btn btn-outline-primary">
                            Medio Ambiente →
                        </a>

                        <a href="#" class="btn btn-outline-primary">
                            Educación →
                        </a>

                        <a href="#" class="btn btn-outline-primary">
                            Justicia Económica →
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card">
                                <img class="card-img-top"
                                     src="https://assets.change.org/photos/9/ca/rm/JACarMOCmNQsrUQ-800x450-noPad.jpg?1653998327"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Mi hija se suicidó con 15 años. El bullying NO es cosa de niñ@s > ¡LEY ACOSO...
                                    </h5>
                                    <a href="#" style="color: blue;" class="btn">🖌️ 20.196 Firmas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card">
                                <img class="card-img-top"
                                     src="https://assets.change.org/photos/8/eh/jj/XZehjjclUZeHmQa-800x450-noPad.jpg?1759927897"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"> El asesino de mi hijo tenía 17 años. Pido revisar YA la ley del menor para
                                        casos graves
                                    </h5>
                                    <a href="#" style="color: blue;" class="btn">🖌️ 20.196 Firmas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card">
                                <img class="card-img-top"
                                     src="https://assets.change.org/photos/9/nn/si/ArnnsibjtqWOsuJ-800x450-noPad.jpg?1758190667"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Me han echado de clase por llevar Hiyab. ¡Libertad religiosa YA en Instituto...
                                    </h5>
                                    <a href="#" style="color: blue;" class="btn">🖌️ 20.196 Firmas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card">
                                <img class="card-img-top"
                                     src="https://assets.change.org/photos/6/zy/tu/XvzyTUYFsYcnqzV-800x450-noPad.jpg?1758742974"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Soy víctima de violencia machista. Pido mejorar urgentemente las pulseras de
                                        protección
                                    </h5>
                                    <a href="#" style="color: blue;" class="btn">🖌️ 20.196 Firmas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <aside class="contribution-aside py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <h2 class="h1">Apoya el cambio <br> Contribuye hoy</h2>
                    <div style="height: auto;max-width: 100%;" class="d-sm-block d-md-none col-12 text-center">
                        <img src="https://static.change.org/homepageV3/homepage-sunrise-contribute@1x.png" class="img-fluid"
                             alt="Iconos de contribución">
                    </div>
                    <p class="my-3 fs-5">
                        Change.org es una organización independiente, financiada únicamente por millones de usuarios como tú.
                        Colabora con Change para proteger el poder de las personas que marcan una diferencia.
                    </p>
                    <button class="botonContribuir"><a href="#" class="btn btn-contribute">Contribuir</a></button>

                </div>

                <div class="d-none d-md-block col-md-6 text-center">
                    <img src="https://static.change.org/homepageV3/homepage-sunrise-contribute@1x.png" class="img-fluid"
                         alt="Iconos de contribución">
                </div>

            </div>
        </div>
    </aside>
@endsection


