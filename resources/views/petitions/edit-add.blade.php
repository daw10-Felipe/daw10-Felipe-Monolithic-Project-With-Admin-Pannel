@extends('layouts.public')

@section('content')
    <div class="page-create-petition">
        <div class="container my-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($petition) ? route('petitions.update', $petition->id) : route('petitions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($petition))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="petition-step-title text-center">
                            {{ isset($petition) ? 'Editar tu petición' : 'Primero, cuéntanos sobre tu causa' }}
                        </h2>
                        <p class="petition-step-subtitle text-center">
                            {{ isset($petition) ? 'Modifica los detalles necesarios para mejorar tu petición.' : 'Combinaremos tus palabras con nuestra experiencia para crearte el borrador de petición más impactante.' }}
                        </p>

                        <div class="form-group text-start mt-4">
                            <label for="title" class="form-label petition-form-label">Título de la petición</label>
                            <input type="text" name="title" class="form-control petition-input" id="title" placeholder="Ej: Salvar el parque central..." value="{{ old('title', $petition->title ?? '') }}" required>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="category" class="form-label petition-form-label">Categoría</label>
                            <select name="category" id="category" class="form-control petition-input" required>
                                <option value="" disabled {{ !isset($petition) ? 'selected' : '' }}>Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ (old('category', $petition->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="destinatary" class="form-label petition-form-label">Destinatario</label>
                            <input type="text" name="destinatary" class="form-control petition-input" id="destinatary" placeholder="Ej: Ayuntamiento de Madrid" value="{{ old('destinatary', $petition->destinatary ?? '') }}" required>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="petitionCause" class="form-label petition-form-label">Quiero...</label>
                            <textarea name="description" class="form-control petition-textarea" id="petitionCause" rows="5" placeholder="Exigir que todos los edificios públicos sean accesibles..." required>{{ old('description', $petition->description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="petition-separator" />

                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="petition-step-title text-center">
                                {{ isset($petition) ? 'Imagen de la petición' : 'Una última cosa' }}
                            </h2>
                            <p class="petition-step-subtitle text-center">
                                {{ isset($petition) ? 'Puedes subir una nueva imagen si deseas cambiar la actual.' : 'Añadir una imagen hará que tu petición destaque más.' }}
                            </p>

                            @if(isset($petition) && $petition->files->count() > 0)
                                <div class="mb-4 text-center">
                                    <p class="text-muted small mb-2">Imagen actual:</p>
                                    <img src="{{ asset('petitions/' . $petition->files->first()->file_path) }}"
                                         alt="Current Image"
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px;">
                                </div>
                            @endif

                            <div class="form-group text-start mt-4">
                                <label for="file" class="form-label petition-form-label">
                                    {{ isset($petition) ? 'Cambiar imagen (Opcional)' : 'Imagen principal' }}
                                </label>
                                <input type="file" name="file" class="form-control petition-input" id="file" {{ isset($petition) ? '' : 'required' }}>
                            </div>

                            <div class="petition-button-group mt-4 d-flex justify-content-between">
                                <a href="{{ isset($petition) ? route('petitions.show', $petition->id) : url()->previous() }}" class="btn petition-btn-back">Cancelar</a>
                                <button type="submit" class="btn petition-btn-continue">
                                    {{ isset($petition) ? 'Guardar Cambios' : 'Continuar' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
