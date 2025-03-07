<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EnviarCorreo;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('Usuario.index');
    }

    public function showRegistrationForm()
    {
        return view('Usuario.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
            'nombre' => 'required|string|max:100',
            'correo_u' => 'required|string|email|max:100',
            'numero' => 'required|string|max:16'
        ]);
    
        $respuesta_pregunta = null;
        $id_nivel = 2;
        $id_pregunta = null;
        $estado = 'A';
        $intentos = 0;
        $temporal = 1;
        $dias = 30;
    
        $contraseñaEncriptada = Str::random(10);

        $idUsuario = DB::table('usuario')->insertGetId([
            'codigo_usuario' => $request->codigo,
            'nombre_usuario' => $request->nombre,
            'correo' => $request->correo_u,
            'contrasena' => $contraseñaEncriptada, // Guardar la contraseña encriptada
            'telefono' => $request->numero,
            'respuesta_pregunta' => $respuesta_pregunta,
            'estado' => $estado,
            'id_nivel' => $id_nivel,
            'id_pregunta' => $id_pregunta,
            'intentos' => $intentos,
            'temporal' => $temporal,
            'dias' => $dias,
        ]);

        // Ejecutar el procedimiento almacenado para registrar en bitácora
        DB::statement("EXEC sp_RegistrarUsuarioConContrasenaEncriptada 
            @codigo = ?, 
            @nombre = ?, 
            @correo_u = ?, 
            @numero = ?, 
            @contrasenaTemporal = ?, 
            @id_usuario = ?", 
            [$request->codigo, $request->nombre, $request->correo_u, $request->numero, $contraseñaGenerada, $idUsuario]
        );

        // Enviar correo al usuario con la contraseña generada
        $usuario = $request->nombre;
        Mail::to($request->correo_u)->send(new EnviarCorreo($contraseñaGenerada, $request->correo_u, $usuario));

        //DB::statement("EXEC sp_RegistrarUsuarioConContrasenaEncriptada '$contraseñaEncriptada'");


        return redirect()->route('Usuario')->with('success', 'Usuario registrado exitosamente');
    }
}
