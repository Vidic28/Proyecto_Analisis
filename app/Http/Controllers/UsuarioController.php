<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

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
            'id_usuario' => 'required|integer|unique:usuario,id_usuario',
            'nombre_usuario' => 'required|string|max:100',
            'correo' => 'required|string|email|max:100|unique:usuario,correo',
            'contrasena' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:16',
            'estado' => 'required|string|max:1',
        ]);

        // Valores predeterminados para los campos que no se ingresan desde la vista
        $codigo_usuario = 'default_code';
        $respuesta_pregunta = null;
        $id_nivel = 2;
        $id_pregunta = null;
        $intentos = 0;
        $temporal = 1;
        $dias = 30;

        // Insertar datos en la base de datos
        DB::table('usuario')->insert([
            'id_usuario' => $request->id_usuario,
            'codigo_usuario' => $codigo_usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena),
            'telefono' => $request->telefono,
            'respuesta_pregunta' => $respuesta_pregunta,
            'estado' => $request->estado,
            'id_nivel' => $id_nivel,
            'id_pregunta' => $id_pregunta,
            'intentos' => $intentos,
            'temporal' => $temporal,
            'dias' => $dias,
        ]);

        return redirect()->route('Usuario')->with('success', 'Usuario registrado exitosamente');
    }
}
