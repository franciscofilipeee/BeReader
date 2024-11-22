<?php

use App\Http\Controllers\AutoresController;
use App\Http\Controllers\AvaliacoesController;
use App\Http\Controllers\BibliotecasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\UserTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/livros', [LivrosController::class, 'index']);
Route::get('/livro/{id}', [LivrosController::class, 'list']);

Route::get('/bibliotecas', [BibliotecasController::class, 'index']);
Route::get('/biblioteca/detalhes/{id}', [BibliotecasController::class, 'list']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/biblioteca/registerlivro', [LivrosController::class, 'storeEstoque'])->name('register.estoque');
    Route::get('/biblioteca/deletelivro', [LivrosController::class, 'deleteEstoque'])->name('delete.estoque');
    Route::post('/admin/registerlivro', [LivrosController::class, 'store'])->name('register.livros');
    Route::post('/admin/registertema', [TemasController::class, 'store'])->name('register.temas');
    Route::post('/admin/registerautor', [AutoresController::class, 'store'])->name('register.autores');
    Route::post('/admin/delete', [LivrosController::class, 'delete']);
    Route::post('/biblioteca/store/fotos', [BibliotecasController::class, 'storeFoto'])->name('bibliotecas.store_fotos');
    Route::post('/biblioteca/delete/fotos', [BibliotecasController::class, 'destroyFoto'])->name('bibliotecas.delete_foto');
    Route::get('/emprestimo/{biblioteca_id}/{livro_id}', [EmprestimosController::class, 'index']);
    Route::post('/emprestimo/store', [EmprestimosController::class, 'store']);
    Route::get('/livro/{id}/avaliar', [AvaliacoesController::class, 'write']);
    Route::post('/livro/{id}/avaliar', [AvaliacoesController::class, 'store']);
    Route::post('/avaliacao/{id}/delete', [AvaliacoesController::class, 'delete']);
    Route::post('/profile/avaliacao/{id}/delete', [AvaliacoesController::class, 'deleteProfile']);
    Route::post('/user/foto/store', [ProfileController::class, 'uploadFoto']);
    Route::get('/user/foto/delete', [ProfileController::class, 'deleteFoto']);
});

Route::get('/list/usertype', [UserTypeController::class, 'list']);

require __DIR__ . '/auth.php';
