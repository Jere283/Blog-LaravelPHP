<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\postController;
use App\Http\Controllers\comentarioController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view("register");
});

Route::get('/login', function () {
    return view("signin");
});

Route::get('/inicio', function () {
    return view("inicio");
});
Route::get('/estadisticas', function(){
    return view("estadisticas");
});

Route::post('/users', [UserController::class, 'registerUser'])->name('registrar.usuario');
Route::post('/users2', [UserController::class, 'loginUser'])->name('login.usuario');
Route::post('/publicacion', [postController::class, 'registerPublicacion'])->name('post.publicacion');
Route::get('/comentarios', [comentarioController::class, 'comentarioPublic']);
Route::post('/comentarios/agregar', [comentarioController::class, 'registerComentary']);
Route::post('/comentario/crear/id/{idpublicacion}', [ComentarioController::class, 'registerComentary'])->name('comentarios.agregar');

