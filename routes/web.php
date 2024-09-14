<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicial');
})->name('index');


Route::prefix('filmes')->group(function () {
    Route::get('/', [FilmesController::class, 'index'])->name('filmes');
    Route::get('/', [FilmesController::class, 'index'])->name('filmes');
    Route::get('cadastrar', [FilmesController::class, 'cadastrar'])->name('filmes.cadastrar');
    Route::post('cadastrar', [FilmesController::class, 'gravar'])->name('filmes.gravar');


    Route::get('/filmes/apagar/{filme}', [FilmesController::class, 'apagar'])->name('filmes.apagar');

    Route::delete('/filmes/apagar/{filme}', [FilmesController::class, 'deletar']);


    Route::get('editar/{filme}', [FilmesController::class, 'editar'])->name('filmes.editar');
    Route::put('editar/{filme}', [FilmesController::class, 'editarGravar']);
});

Route::prefix('usuarios')->middleware('auth')->group(function () {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

    Route::get('/editar/{usuario}', [UsuariosController::class, 'editar'])->name('usuarios.editar');
    Route::put('/editar/{usuario}', [UsuariosController::class, 'editarGravar']);
});


Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
