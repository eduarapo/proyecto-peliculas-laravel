<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        return view('peliculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'anio' => 'required|integer|min:1895|max:' . (date('Y') + 1),
            'genero' => 'required|string|max:100',
        ]);

        Pelicula::create($request->all());

        return redirect()->route('peliculas.index')->with('success', '¡Película guardada con éxito!');
    }

    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'anio' => 'required|integer',
            'genero' => 'required|string|max:100',
        ]);

        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')->with('success', '¡Película actualizada correctamente!');
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Película eliminada del sistema.');
    }
}