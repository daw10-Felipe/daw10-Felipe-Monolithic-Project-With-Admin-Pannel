@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark mb-0">{{ $user->id ? 'Editar Usuario' : 'Nuevo Usuario' }}</h3>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> Volver
        </a>
    </div>

    <div class="card shadow border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ $user->id ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
                @csrf
                @if($user->id) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="{{ $user->id ? 'Dejar en blanco para mantener' : 'Mínimo 8 caracteres' }}">
                        @if($user->id)
                            <div class="form-text">Solo rellena este campo si deseas cambiar la contraseña.</div>
                        @endif
                        @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">Rol</label>
                        <select name="role_id" class="form-select">
                            {{-- CORRECCIÓN AQUÍ: 1 = Usuario, 2 = Admin --}}
                            <option value="1" {{ old('role_id', $user->role_id) == 1 ? 'selected' : '' }}>Usuario</option>
                            <option value="2" {{ old('role_id', $user->role_id) == 2 ? 'selected' : '' }}>Administrador</option>
                        </select>
                        @error('role_id') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top text-end">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold">
                        <i class="fas fa-save me-2"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
