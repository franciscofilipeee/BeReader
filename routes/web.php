<?php

use App\Http\Controllers\BibliotecasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\UserTypeController;
use App\Models\Bibliotecas;
use App\Models\Emprestimos;
use App\Models\Livros;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/livros', [LivrosController::class, 'index']);

Route::get('/bibliotecas', [BibliotecasController::class, 'index']);

Route::post('/biblioteca/registerlivro', [LivrosController::class, 'storeEstoque'])->name('register.estoque');

Route::post('/admin/registerlivro', [LivrosController::class, 'store'])->name('register.livros');

Route::post('/admin/registertema', [TemasController::class, 'store'])->name('register.temas');

Route::post('/biblioteca/store/fotos', [BibliotecasController::class, 'storeFoto'])->name('bibliotecas.store_fotos');

Route::post('/biblioteca/delete/fotos', [BibliotecasController::class, 'destroyFoto'])->name('bibliotecas.delete_foto');

Route::get('/biblioteca/detalhes/{id}', [BibliotecasController::class, 'list']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/list/usertype', [UserTypeController::class, 'list']);

require __DIR__ . '/auth.php';
