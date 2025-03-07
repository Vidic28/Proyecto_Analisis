<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
use App\Http\Controllers\RecuperacionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/usuario', [UsuarioController::class, 'showRegistrationForm'])->name('Usuario');
//Route::post('/usuario', [UsuarioController::class, 'Usuario']);



Route::get('/usuario', [UsuarioController::class, 'showRegistrationForm'])->name('Usuario');
Route::post('/usuario', [UsuarioController::class, 'register'])->name('Usuario');


//Route::get('/Usuario', [UsuarioController::class, 'index'])->name('Usuario');




/*Route::post('Metodo-de-Recuperación', function(){
    Mail::to(request()->email)->send(new EnviarCorreo(request()->password, request()->email));
    return redirect()->route('login')->with('info', 'Se ha enviado un correo con las instrucciones para recuperar la contraseña');
})->name('Metodo-de-Recuperación');
*/
Route::post('Metodo-de-Recuperacion', [RecuperacionController::class, 'recuperarContrasena'])->name('Metodo-de-Recuperacion');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/index', [UsuarioController::class, 'showRegistrationForm'])->name('Usuario');
Route::post('/index', [UsuarioController::class, 'Usuario']);
