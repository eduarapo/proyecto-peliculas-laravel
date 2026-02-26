@extends('layout')

@section('contenido')
    <a href="{{ route('peliculas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Película</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Año</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peliculas as $pelicula)
            <tr>
                <td>{{ $pelicula->id }}</td>
                <td>{{ $pelicula->titulo }}</td>
                <td>{{ $pelicula->anio }}</td>
                <td>{{ $pelicula->genero }}</td>
                <td>
                    <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta película?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection