<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\StatusController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('perfis', PerfilController::class);
    Route::resource('usuarios', UsuarioController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('chamados', ChamadoController::class);
    Route::resource('status', StatusController::class);

    // Route::resource('perfis', PerfilController::class);
    // Route::resource('categorias', CategoriaController::class);

});

require __DIR__.'/auth.php';
