@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-0">Editar Petición</h3>
                <small class="text-muted">ID: #{{ $petition->id }}</small>
            </div>
            <a href="{{ route('admin.home') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Volver al listado
            </a>
        </div>

        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-4">
                <form action="{{ route('adminpetitions.update', $petition->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <div class="col-md-8">

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold text-secondary text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    Título de la Petición
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('title') is-invalid @enderror"
                                       id="title"
                                       name="title"
                                       value="{{ old('title', $petition->title) }}"
                                       placeholder="Escribe el título aquí...">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold text-secondary text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    Descripción Detallada
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="6"
                                          placeholder="Describe la causa...">{{ old('description', $petition->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 h-100">

                                <div class="mb-4">
                                    <label for="category_id" class="form-label fw-bold text-dark">Categoría</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                        <option value="" disabled>Selecciona una opción</option>
                                        @foreach($categorias as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ (old('category_id', $petition->category_id) == $cat->id) ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="status" class="form-label fw-bold text-dark">Estado</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                        <option value="pending" {{ (old('status', $petition->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ (old('status', $petition->status) == 'accepted') ? 'selected' : '' }}>Accepted</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="text-secondary opacity-25">

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark d-block">Imagen (Clic para cambiar)</label>

                                    <label for="image_upload" class="d-block position-relative" style="cursor: pointer;">
                                        @php $image = $petition->files->first(); @endphp

                                        @if($image && !empty($image->file_path))
                                            <div class="position-relative">
                                                <img src="{{ asset('petitions/' . $image->file_path) }}"
                                                     class="img-fluid rounded shadow-sm w-100"
                                                     style="max-height: 200px; object-fit: cover;"
                                                     alt="Imagen de la petición">
                                                <div class="position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50 rounded-circle p-2">
                                                    <i class="fas fa-camera"></i>
                                                </div>
                                            </div>
                                        @else
                                            <div class="rounded border border-dashed p-4 text-center text-muted bg-white">
                                                <i class="fas fa-image fa-2x mb-2"></i>
                                                <p class="mb-0 small">Clic para subir imagen</p>
                                            </div>
                                        @endif
                                    </label>

                                    <input type="file" name="image" id="image_upload" class="d-none" accept="image/*">
                                    @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('admin.home') }}" class="btn btn-light border text-secondary px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold">
                            <i class="fas fa-save me-2"></i> Guardar Cambios
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
