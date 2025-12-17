@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark">Gestión de Categorías</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary px-4 shadow-sm">
                <i class="fas fa-plus me-2"></i> Nueva Categoría
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
                            <th class="py-3">Fecha Creación</th>
                            <th class="py-3 text-end pe-4">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $category->id }}</td>
                                <td class="fw-bold text-dark">{{ $category->name }}</td>
                                <td class="text-muted">{{ $category->created_at ? $category->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm" title="Editar">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('¿Borrar categoría?');" class="d-inline">
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
                                <td colspan="4" class="text-center py-5 text-muted">No hay categorías registradas.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
