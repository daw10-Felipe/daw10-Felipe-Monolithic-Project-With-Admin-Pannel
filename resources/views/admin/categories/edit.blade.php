@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark mb-0">{{ $category->id ? 'Editar Categoría' : 'Nueva Categoría' }}</h3>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Volver
            </a>
        </div>

        <div class="card shadow border-0 rounded-3" style="max-width: 600px; margin: 0 auto;">
            <div class="card-body p-4">

                <form action="{{ $category->id ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
                    @csrf
                    @if($category->id) @method('PUT') @endif

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary text-uppercase small">Nombre de la Categoría</label>
                        <input type="text"
                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name', $category->name) }}"
                               required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold">
                            <i class="fas fa-save me-2"></i> Guardar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
