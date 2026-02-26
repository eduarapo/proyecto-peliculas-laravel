<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return redirect()->route('peliculas.index');
});

Route::resource('peliculas', PeliculaController::class);