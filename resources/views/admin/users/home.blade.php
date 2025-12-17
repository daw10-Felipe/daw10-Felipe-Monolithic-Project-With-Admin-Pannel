@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Gestión de Usuarios</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-user-plus me-2"></i> Nuevo Usuario
        </a>
    </div>

    <div class="card shadow border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                    <tr class="text-uppercase text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">
                        <th class="ps-4 py-3">ID</th>
                        <th class="py-3">Nombre</th>
                        <th class="py-3">Email</th>
                        <th class="py-3 text-center">Rol</th>
                        <th class="py-3 text-end pe-4">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="ps-4 text-muted">#{{ $user->id }}</td>
                            <td>
                                <span class="fw-bold d-block text-dark">{{ $user->name }}</span>
                                @if($user->email_verified_at)
                                    <small class="text-success"><i class="fas fa-check-circle"></i> Verificado</small>
                                @else
                                    <small class="text-warning"><i class="fas fa-exclamation-circle"></i> No verificado</small>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>

                            {{-- CORRECCIÓN AQUÍ: 2 = Admin, 1 = User --}}
                            <td class="text-center">
                                @if($user->role_id == 2)
                                    <span class="badge bg-danger px-3 py-2 rounded-pill">Admin</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">User</span>
                                @endif
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('¿Borrar este usuario?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No hay usuarios registrados.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
