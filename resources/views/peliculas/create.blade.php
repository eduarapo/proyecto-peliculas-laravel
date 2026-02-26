@extends('layout')

@section('contenido')
    <h2>Agregar Película</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peliculas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>
        <div class="mb-3">
            <label>Año de Lanzamiento:</label>
            <input type="number" name="anio" class="form-control" value="{{ old('anio') }}" required>
        </div>
<div class="mb-3">
            <label>Género:</label>
            <select name="genero" class="form-select" required>
                <option value="" disabled selected>Selecciona un género...</option>
                <option value="Acción" {{ old('genero') == 'Acción' ? 'selected' : '' }}>Acción</option>
                <option value="Comedia" {{ old('genero') == 'Comedia' ? 'selected' : '' }}>Comedia</option>
                <option value="Terror" {{ old('genero') == 'Terror' ? 'selected' : '' }}>Terror</option>
                <option value="Ciencia Ficción" {{ old('genero') == 'Ciencia Ficción' ? 'selected' : '' }}>Ciencia Ficción</option>
                <option value="Anime" {{ old('genero') == 'Anime' ? 'selected' : '' }}>Anime</option>
                <option value="Drama" {{ old('genero') == 'Drama' ? 'selected' : '' }}>Drama</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection