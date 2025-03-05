<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'contrasena');
        $usuario = DB::table('usuario')
            ->where('correo', $credentials['correo'])
            ->first();

        if (!$usuario) {
            return back()->withErrors([
                'correo' => 'No se pudo acceder. Intente de nuevo.',
            ])->withInput();
        }
        if ($usuario->intentos >= 5) {
            return back()->withErrors([
                'bloqueado' => 'Usuario bloqueado. Contacte al administrador.',
            ])->withInput();
        }

        if (md5($credentials['contrasena']) === $usuario->contrasena) {
            DB::table('usuario')
                ->where('id_usuario', $usuario->id_usuario)
                ->update(['intentos' => 0]);
            Auth::loginUsingId($usuario->id_usuario);
            return redirect()->intended('welcome');
        }
        $nuevoIntentos = $usuario->intentos + 1;
        DB::table('usuario')
            ->where('id_usuario', $usuario->id_usuario)
            ->update(['intentos' => $nuevoIntentos]);
        return back()->withErrors([
            'correo' => 'No se pudo acceder. Intente de nuevo.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
