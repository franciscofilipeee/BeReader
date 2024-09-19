<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/list/usertype', [UserTypeController::class, 'list']);

require __DIR__ . '/auth.php';
