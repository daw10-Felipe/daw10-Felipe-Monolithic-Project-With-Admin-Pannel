@extends('layouts.public')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center mb-4">Registrarse</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @if($errors->has('name'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        @if($errors->has('email'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        @if($errors->has('password'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger btn-lg">Registrarse</button>
                    </div>

                    <div class="text-center mt-3">
                        <span class="small text-secondary">¿Ya estás registrado?</span>
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-dark">
                            Inicia sesión
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
