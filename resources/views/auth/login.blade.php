@extends('layouts.public')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center mb-4">Inicia sesión</h2>

                <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @if($errors->has('email'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                        @if($errors->has('password'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label text-secondary">Recuérdame</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger btn-lg">Iniciar Sesión</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small text-secondary" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
