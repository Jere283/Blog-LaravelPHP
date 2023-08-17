<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\postController;
use App\Http\Controllers\likesController;
use App\Http\Controllers\comentarioController;
use App\Http\Controllers\seguidoresController;
use App\Http\Controllers\pruebaController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [UserController::class, "registerView"])->name("register.view");
Route::get('/login', [UserController::class, "SignInView"])->name('login.view');

Route::post('/users', [UserController::class, 'registerUser'])->name('registrar.usuario');
Route::post('/users2', [UserController::class, 'loginUser'])->name('login.usuario');

Route::group(["middleware" => "web-session"], function () {
    Route::get('/inicio', [postController::class, "index"])->name("inicio");
    Route::get('/logout', [UserController::class, "logoutUser"])->name("logout.user");
    Route::get("/profile", [UserController::class, "index"])->name('show.profile');
    Route::post('/comentarios/agregar', [comentarioController::class, 'registerComentary']);

    Route::post('/publicacion', [postController::class, 'registerPublicacion'])->name('post.publicacion');

    Route::post('/comentario/crear/id/{idpublicacion}', [ComentarioController::class, 'registerComentary'])->name('comentarios.agregar');
    Route::post('/dar/like/{idpublicacion}/{idusuario}', [likesController::class, 'giveLike'])->name('dar.like');
    Route::delete('/dar/unlike/{idpublicacion}/{idusuario}', [likesController::class, 'giveUnLike'])->name('dar.Unlike');
    Route::post('/seguir/{seguidorId}/{seguidoId}', [seguidoresController::class, 'seguirUsuario'])->name('seguir.usuario');
    Route::delete('quitar/seguir/{seguidorId}/{seguidoId}', [seguidoresController::class, 'quitarFollow'])->name('quitar.follow');
});


Route::get('/comentarios', [comentarioController::class, 'comentarioPublic']);

Route::get("/out", [postController::class, "indexOut"])->name('inicio.logout');