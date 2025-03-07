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
            'codigo' => 'required|string',
            'nombre' => 'required|string|max:100',
            'correo_u' => 'required|string|email|max:100',
            'numero' => 'required|string|max:16',
            'estado' => 'required|string|max:1',
        ]);
    
        $respuesta_pregunta = null;
        $id_nivel = 2;
        $id_pregunta = null;
        $intentos = 0;
        $temporal = 1;
        $dias = 30;
    
        DB::table('usuario')->insert([
            
            'codigo_usuario' => $request->codigo,
            'nombre_usuario' => $request->nombre,
            'correo' => $request->correo_u,
            'contrasena' => md5($request->contrasena),
            'telefono' => $request->numero,
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
