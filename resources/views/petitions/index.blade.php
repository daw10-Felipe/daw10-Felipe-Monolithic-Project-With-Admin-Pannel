@extends('layouts.public')

@section('content')
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
                            <input placeholder="🔎 Buscar peticiones" type="text" class="form-control inputTextoListPetitions">
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
                                        <img src="{{ asset('src/ubi.png') }}" alt="">
                                        <p>Cerca de ti</p>
                                    </button>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <button class="botonesList shadow-sm">
                                        <img src="{{ asset('src/inversiones.png') }}" alt="">
                                        <p>Populares</p>
                                    </button>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <button class="botonesList shadow-sm">
                                        <img src="{{ asset('src/ubicacion.png') }}" alt="">
                                        <p>Victorias</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-bottom: 130px;" class="row">
                    <div class="col-12">
                        <h2 class="subtitulosDescubre">Peticiones Activas</h2>
                        <div class="row">
                            @foreach($petitions as $petition)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm">

                                        @php
                                            $image = $petition->files->first();
                                        @endphp

                                        @if($image && !empty($image->file_path))
                                            <img src="{{ asset('petitions/' . $image->file_path) }}"
                                                 class="card-img-top"
                                                 style="height: 200px; object-fit: cover;"
                                                 alt="{{ $petition->title }}">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <span>Sin imagen</span>
                                            </div>
                                        @endif


                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title mb-3">{{ $petition->title }}</h5>


                                            @php
                                                $goal = 100;
                                                $percentage = ($petition->signeds / $goal) * 100;
                                            @endphp


                                            <div class="mt-auto pt-3">
                                                <div class="d-flex justify-content-between align-items-end">


                                                    <div class="w-100 me-3">
                                                        <div class="progress mb-1" style="height: 6px;">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentage }}%"></div>
                                                        </div>
                                                        <small class="text-muted fw-bold">{{ $petition->signeds }} firmas</small>
                                                    </div>


                                                    <div>
                                                        <a href="{{ route('petitions.show', $petition->id) }}" class="btn btn-primary btn-sm text-nowrap">Ver</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
