<?php

use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
});


Route::prefix('filmes')->group(function () {
    Route::get('', [FilmesController::class, 'index'])->name('filmes');
    Route::get('cadastrar', [FilmesController::class, 'cadastrar'])->name('filmes.cadastrar');
    Route::post('cadastrar', [FilmesController::class, 'gravar'])->name('filmes.gravar');

    // Route::get('apagar/{filme}', [FilmesController::class, 'apagar'])->name('filmes.apagar');
    // Route::apagar('apagar/{filme}', [FilmesController::class, 'remove']);

    Route::get('editar/{filme}', [FilmesController::class, 'editar'])->name('filmes.editar');
    Route::put('editar/{filme}', [FilmesController::class, 'editarGravar']);
});