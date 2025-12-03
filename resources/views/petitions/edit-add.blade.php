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

            <form action="{{ route('petitions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="petition-step-title text-center">
                            Primero, cuéntanos sobre tu causa
                        </h2>
                        <p class="petition-step-subtitle text-center">
                            Combinaremos tus palabras con nuestra experiencia para crearte el borrador de petición más impactante.
                        </p>

                        <div class="form-group text-start mt-4">
                            <label for="title" class="form-label petition-form-label">Título de la petición</label>
                            <input type="text" name="title" class="form-control petition-input" id="title" placeholder="Ej: Salvar el parque central..." value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="category" class="form-label petition-form-label">Categoría</label>
                            <select name="category" id="category" class="form-control petition-input" required>
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="destinatary" class="form-label petition-form-label">Destinatario</label>
                            <input type="text" name="destinatary" class="form-control petition-input" id="destinatary" placeholder="Ej: Ayuntamiento de Madrid" value="{{ old('destinatary') }}" required>
                        </div>

                        <div class="form-group text-start mt-4">
                            <label for="petitionCause" class="form-label petition-form-label">Quiero...</label>
                            <textarea name="description" class="form-control petition-textarea" id="petitionCause" rows="5" placeholder="Exigir que todos los edificios públicos sean accesibles..." required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="petition-separator" />

                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="petition-step-title text-center">Una última cosa</h2>
                            <p class="petition-step-subtitle text-center">
                                Añadir una imagen hará que tu petición destaque más.
                            </p>

                            <div class="form-group text-start mt-4">
                                <label for="file" class="form-label petition-form-label">Imagen principal</label>
                                <input type="file" name="file" class="form-control petition-input" id="file" required>
                            </div>

                            <div class="petition-button-group mt-4 d-flex justify-content-between">
                                <a href="{{ url()->previous() }}" class="btn petition-btn-back">Volver</a>
                                <button type="submit" class="btn petition-btn-continue">Continuar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
