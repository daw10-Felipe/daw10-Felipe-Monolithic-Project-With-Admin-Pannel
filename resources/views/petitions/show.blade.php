@extends('layouts.public')

@section('content')
    <main>
        <div class="container" style="padding-top: 40px; padding-bottom: 80px;">

            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="tituloListPetitions">{{ $petition->title }}</h1>
                    <p class="text-muted">Iniciada por {{ $petition->user->name ?? 'Usuario' }}</p>
                </div>

                <div class="col-lg-8 col-12">
                    <div class="mb-4">
                        @php
                            $image = $petition->files->first();
                        @endphp

                        @if($image && !empty($image->file_path))
                            <img src="{{ asset('petitions/' . $image->file_path) }}"
                                 class="img-fluid rounded shadow-sm w-100"
                                 style="max-height: 500px; object-fit: cover;"
                                 alt="{{ $petition->title }}">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center shadow-sm" style="height: 300px;">
                                <span class="text-muted">Sin imagen</span>
                            </div>
                        @endif
                    </div>

                    <div class="parrafoListPetitions text-break mb-5">
                        <p>{{ $petition->description }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12">

                    @can('update', $petition)
                        <div class="mb-3">
                            <a href="{{ route('petitions.edit', $petition->id) }}" class="btn btn-primary w-100">
                                <i class="fas fa-edit me-2"></i> Editar Petición
                            </a>
                        </div>
                    @endcan

                    <div class="card shadow-sm border-0 sticky-top" style="top: 20px; z-index: 1;">
                        <div class="card-body p-4">

                            @php
                                $meta = 100;
                                $firmas = $petition->signeds;
                                $porcentaje = ($firmas / $meta) * 100;
                            @endphp

                            <div class="mb-3">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                         style="width: {{ $porcentaje }}%"
                                         aria-valuenow="{{ $firmas }}"
                                         aria-valuemin="0"
                                         aria-valuemax="{{ $meta }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <strong>{{ number_format($firmas) }} firmas</strong>
                                    <span class="text-muted">Meta: {{ number_format($meta) }}</span>
                                </div>
                            </div>

                            <h5 class="card-title mb-3">¡Firma esta petición!</h5>

                            @auth
                                @php
                                    $hasSigned = $petition->signers()->where('user_id', Auth::id())->exists();
                                @endphp

                                @if($hasSigned)
                                    <div class="mb-3 text-center">
                                        <p class="text-success fw-bold">
                                            ¡Ya has firmado esta petición!
                                        </p>
                                    </div>
                                    <button type="button" class="w-100 btn btn-secondary py-2" disabled>
                                        Firmado
                                    </button>
                                @else
                                    <form action="{{ route('petitions.sign', $petition->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <p class="text-muted small">
                                                Estás firmando como <strong>{{ Auth::user()->name }}</strong>.
                                            </p>
                                        </div>
                                        <button type="submit" class="w-100 buttonAmarillo2 py-2">Firmar ahora</button>
                                    </form>
                                @endif
                            @endauth

                            @guest
                                <div class="alert alert-light border text-center">
                                    <p class="small mb-2">Debes iniciar sesión para firmar.</p>
                                    <a href="{{ route('login') }}" class="btn btn-outline-dark w-100">Iniciar Sesión</a>
                                    <div class="mt-2">
                                        <a href="{{ route('register') }}" class="small text-secondary">¿No tienes cuenta? Regístrate</a>
                                    </div>
                                </div>
                            @endguest

                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ url('/petitions/index') }}" class="text-decoration-none text-secondary">
                            &larr; Volver a todas las peticiones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
