<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/Usuario', [UsuarioController::class, 'index'])->name('Usuario');




Route::post('Metodo-de-Recuperación', function(){
    Mail::to(request()->email)->send(new EnviarCorreo);
    return "Correo enviado exitosamente";
})->name('Metodo-de-Recuperación');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
