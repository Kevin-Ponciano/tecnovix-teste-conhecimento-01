<?php

use App\Http\Controllers\LivroController;
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

Route::get('/cadastro', function () {
    return view('livro.store');
})->name('home');
Route::redirect('/', '/cadastro');
Route::get('/livros', [LivroController::class, 'show'])->name('show');
Route::get('/livros/{id}', [LivroController::class, 'edit'])->name('edit');
Route::post('/store', [LivroController::class, 'store'])->name('store');
