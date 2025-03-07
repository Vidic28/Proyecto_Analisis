<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {

        $credentials = $request->only('correo', 'contrasena');

        // Llamar al procedimiento almacenado
        $usuario = DB::select('EXEC sp_ObtenerUsuarioContrasena ?', [$credentials['correo']]);

        // Verificar si el usuario existe
        if (empty($usuario)) {
            return back()->withErrors(['correo' => 'Usuario no encontrado'])->withInput();
        }

        $usuario = $usuario[0]; // Obtener el primer resultado

        // Verificar si el usuario está inactivo
        if ($usuario->estado === 'I') {
            return back()->withErrors(['inactivo' => 'El usuario está inactivo'])->withInput();
        }

        // Verificar la contraseña ingresada con la desencriptada
        if ($credentials['contrasena'] === $usuario->contrasena_desencriptada) {
            // Restablecer intentos fallidos
            DB::table('usuario')
                ->where('id_usuario', $usuario->id_usuario)
                ->update(['intentos' => 0]);

            // Iniciar sesión
            Auth::loginUsingId($usuario->id_usuario);
            return redirect()->intended('welcome');
        }

        // Incrementar intentos fallidos
        DB::table('usuario')
            ->where('id_usuario', $usuario->id_usuario)
            ->update(['intentos' => $usuario->intentos + 1]);

        return back()->withErrors(['contrasena' => 'Contraseña incorrecta'])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
