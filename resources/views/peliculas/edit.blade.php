@extends('layout')

@section('contenido')
    <h2>Editar Película</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" value="{{ $pelicula->titulo }}" required>
        </div>
        <div class="mb-3">
            <label>Año de Lanzamiento:</label>
            <input type="number" name="anio" class="form-control" value="{{ $pelicula->anio }}" required>
        </div>
<div class="mb-3">
            <label>Género:</label>
            <select name="genero" class="form-select" required>
                <option value="" disabled>Selecciona un género...</option>
                <option value="Acción" {{ $pelicula->genero == 'Acción' ? 'selected' : '' }}>Acción</option>
                <option value="Comedia" {{ $pelicula->genero == 'Comedia' ? 'selected' : '' }}>Comedia</option>
                <option value="Terror" {{ $pelicula->genero == 'Terror' ? 'selected' : '' }}>Terror</option>
                <option value="Ciencia Ficción" {{ $pelicula->genero == 'Ciencia Ficción' ? 'selected' : '' }}>Ciencia Ficción</option>
                <option value="Anime" {{ $pelicula->genero == 'Anime' ? 'selected' : '' }}>Anime</option>
                <option value="Drama" {{ $pelicula->genero == 'Drama' ? 'selected' : '' }}>Drama</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection