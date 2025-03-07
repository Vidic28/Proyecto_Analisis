<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EnviarCorreo;

class RecuperacionController extends Controller
{
    public function recuperarContrasena(Request $request)
    {
        $correo = $request->input('email');

        // Verificar si el correo existe en la base de datos
        $usuario = DB::table('usuario')->where('correo', $correo)->first();

        if (!$usuario) {
            return redirect()->route('password.request')->with('error', 'El correo no está registrado.');
        }

        // Verificar si el usuario está inactivo
        if ($usuario->estado === 'I') {
            return redirect()->route('password.request')->with('error', 'El usuario está inactivo.');
        }

        // Generar una nueva contraseña aleatoria
        $nuevaContrasena = Str::random(10);

        // Actualizar la contraseña en la base de datos con MD5 y marcarla como temporal
        DB::table('usuario')
            ->where('correo', $correo)
            ->update([
                'contrasena' => md5($nuevaContrasena),
                'temporal' => '1'
            ]);

        // Enviar el correo con la nueva contraseña
        Mail::to($correo)->send(new EnviarCorreo($nuevaContrasena, $correo,$usuario));

        return redirect()->route('login')->with('info', 'Se ha enviado un correo con la nueva contraseña.');
    }
}
