<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;



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

Route::get('/Usuario', [UsuarioController::class, 'index'])->name('Usuario');




/*Route::post('Metodo-de-Recuperación', function(){
    Mail::to(request()->email)->send(new EnviarCorreo(request()->password, request()->email));
    return redirect()->route('login')->with('info', 'Se ha enviado un correo con las instrucciones para recuperar la contraseña');
})->name('Metodo-de-Recuperación');
*/
Route::post('Metodo-de-Recuperación', function (Request $request) {
    $correo = $request->input('email');

    // Verificar si el correo existe en la base de datos
    $usuario = DB::table('usuario')->where('correo', $correo)->first();

    if (!$usuario) {
        return redirect()->route('password.request')->with('error', 'El correo no está registrado.');
    }

    // Generar una nueva contraseña aleatoria
    $nuevaContrasena = Str::random(10);

    // Actualizar la contraseña en la base de datos (hasheada)
    DB::table('usuario')
        ->where('correo', $correo)
        ->update(['contrasena' => md5($nuevaContrasena),'temporal' => '1']);

    // Enviar el correo con la nueva contraseña
    Mail::to($correo)->send(new EnviarCorreo($nuevaContrasena, $correo));

    return redirect()->route('login')->with('info', 'Se ha enviado un correo con la nueva contraseña.');
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
