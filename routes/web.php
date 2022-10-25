<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\EmprestimosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('contatos/buscar',[ContatosController::class,'buscar']);
Route::resource('contatos',ContatosController::class);

Route::get('livros/buscar',[LivrosController::class,'buscar']);
Route::resource('livros',LivrosController::class);

Route::get('emprestimos/buscar',[EmprestimosController::class,'buscar']);
Route::put('emprestimos/{emprestimo}/devolver',[EmprestimosController::class,'devolver'])->name('emprestimos.devolver');
Route::resource('emprestimos',EmprestimosController::class);
