<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::get('/', [LoginController::class, 'MandarLogin'])->name('IniciaSesion');

Route::get('/Usuario', [UsuarioController::class, 'index'])->name('Usuario');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
