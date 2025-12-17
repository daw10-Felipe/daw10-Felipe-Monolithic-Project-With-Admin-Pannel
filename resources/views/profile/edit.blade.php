
@extends(Auth::user()->role_id == 2 ? 'layouts.admin' : 'layouts.public')

@section('content')
    <div class="container py-5">

        <div class="mb-4">
            <h2 class="fw-bold text-dark">Mi Perfil</h2>
            <p class="text-muted">Gestiona tu información personal y seguridad.</p>
        </div>

        <div class="row g-4">


            <div class="col-lg-6">
                <div class="card shadow border-0 rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-secondary fw-bold"><i class="fas fa-user-circle me-2"></i> Datos Personales</h5>
                    </div>
                    <div class="card-body p-4">
                        {{-- Formulario de actualización de perfil --}}
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold small text-muted text-uppercase">Nombre Completo</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold small text-muted text-uppercase">Correo Electrónico</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

                                {{-- Aviso de verificación de email --}}
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="alert alert-warning mt-3 d-flex align-items-center" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <div>
                                            Tu correo no está verificado.
                                            {{-- El formulario para reenviar se gestiona aparte, pero aquí avisamos --}}
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                    <i class="fas fa-save me-2"></i> Guardar Cambios
                                </button>
                            </div>

                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success mt-3 py-2 small fw-bold">
                                    <i class="fas fa-check-circle me-2"></i> Perfil actualizado con éxito.
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            {{-- COLUMNA DERECHA: Seguridad y Zona Peligrosa --}}
            <div class="col-lg-6">

                {{-- Tarjeta Cambio de Contraseña --}}
                <div class="card shadow border-0 rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-secondary fw-bold"><i class="fas fa-key me-2"></i> Seguridad</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="current_password" class="form-label fw-bold small text-muted text-uppercase">Contraseña Actual</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">
                                @error('current_password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label fw-bold small text-muted text-uppercase">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                                    @error('password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold small text-muted text-uppercase">Confirmar Nueva</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-dark px-4 fw-bold shadow-sm">
                                    Actualizar Contraseña
                                </button>
                            </div>

                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success mt-3 py-2 small fw-bold">
                                    <i class="fas fa-check-circle me-2"></i> Contraseña cambiada.
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                {{-- Tarjeta Eliminar Cuenta --}}
                <div class="card border-0 rounded-3 bg-danger bg-opacity-10">
                    <div class="card-body p-4">
                        <h5 class="text-danger fw-bold"><i class="fas fa-trash-alt me-2"></i> Eliminar Cuenta</h5>
                        <p class="text-muted small mb-3">
                            Una vez elimines tu cuenta, no hay vuelta atrás. Por favor, asegúrate de querer hacerlo.
                        </p>
                        <button type="button" class="btn btn-danger fw-bold btn-sm" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                            Eliminar mi cuenta permanentemente
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL DE CONFIRMACIÓN (Fuera del flujo normal para evitar problemas de Z-Index) --}}
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta.</p>
                    <div class="mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña actual" required>
                        @error('password', 'userDeletion') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
