<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{

/* -------------------------------------------------------------------------------------------------------------- */

/* [FUNCION PARA CREAR NUEVOS USUARIOS] */

public function crearUsuario(Request $request)
{
    $request->validate([
        'nombre_usuario' => 'required|string|max:100',
        'usuario_login'  => 'required|string|max:50|unique:usuarios,usuario_login',
        'contrasenia'    => 'required|string|min:3|max:12',
        'genero'         => 'required|string|in:Masculino,Femenino,otro',
        'fotografia'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
        'documento_identificacion' => 'required|string|size:16',
        'fecha_nacimiento' => 'required|date',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|digits_between:8,15',
        'fecha_ingreso' => 'required|date',
        'id_rol' => 'required|exists:roles,id_rol',
    ]);

    $rutaFoto = null;
    if ($request->hasFile('fotografia')) {
        $rutaFoto = $request->file('fotografia')->store('usuarios', 'public');
    }

    $usuarioDatos = [
        'nombre_usuario' => $request->nombre_usuario,
        'usuario_login' => $request->usuario_login,
        'contrasenia' => Hash::make($request->contrasenia),
        'genero' => $request->genero,
        'fotografia' => $rutaFoto,
        'documento_identificacion' => $request->documento_identificacion,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
        'fecha_ingreso' => $request->fecha_ingreso,
        'id_rol' => $request->id_rol,
    ];
        
    try {
        $usuario = Usuarios::create($usuarioDatos);
        if ($usuario) {
            return redirect()->back()->with('mensaje', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'No se pudo crear el usuario');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
    }
}


/* -------------------------------------------------------------------------------------------------------------- */

/* [FUNCION MOSTRAR TODOS LOS USUARIOS] */

    public function ListarUsuarios()
    {
        $usuarios = Usuarios::with('rol')->get();

        return response()->json([
            'status' => true,
            'data' => $usuarios
        ], 200);
    }

/* -------------------------------------------------------------------------------------------------------------- */

    /* [CONTROLADORES DEPURADORES] */

    // public function crearUsuario(Request $request)
    // {
    //     \Log::info('Datos recibidos para crear usuario:', $request->all());
    //     try {
    //         $request->validate([
    //             'nombre_usuario' => 'required|string|max:100',
    //             'usuario_login'  => 'required|string|max:50|unique:usuarios,usuario_login',
    //             'contrasenia'    => 'required|string|min:3|max:12',
    //             'genero'         => 'required|string|in:Masculino,Femenino',
    //             'fotografia'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //             'documento_identificacion' => 'required|string|size:16',
    //             'fecha_nacimiento' => 'required|date',
    //             'direccion' => 'required|string|max:255',
    //             'telefono' => 'required|digits_between:8,15',
    //             'fecha_ingreso' => 'required|date',
    //             'id_rol' => 'required|exists:roles,id_rol',
    //         ]);} catch (\Illuminate\Validation\ValidationException $e) {
    //             \Log::error('Error de validación al crear usuario:', $e->errors());
    //             return response()->json(['errores' => $e->errors()], 422);}

    //     $rutaFoto = null; if ($request->hasFile('fotografia')) {
    //         $rutaFoto = $request->file('fotografia')->store('usuarios', 'public');
    //         \Log::info('Fotografía subida:', ['ruta' => $rutaFoto]);}

    //     $usuarioDatos = [
    //         'nombre_usuario' => $request->nombre_usuario,
    //         'usuario_login' => $request->usuario_login,
    //         'contrasenia' => Hash::make($request->contrasenia),
    //         'genero' => $request->genero,
    //         'fotografia' => $rutaFoto,
    //         'documento_identificacion' => $request->documento_identificacion,
    //         'fecha_nacimiento' => $request->fecha_nacimiento,
    //         'direccion' => $request->direccion,
    //         'telefono' => $request->telefono,
    //         'fecha_ingreso' => $request->fecha_ingreso,
    //         'id_rol' => $request->id_rol,
    //     ];

    //     \Log::info('Intentando crear usuario con los datos:', $usuarioDatos);
    //     try {
    //         $usuario = Usuarios::create($usuarioDatos);
    //         if ($usuario) {
    //             \Log::info('Usuario creado con éxito', ['id' => $usuario->id]);
    //             return response()->json(['mensaje' => 'Usuario creado correctamente', 'usuario' => $usuario], 201);
    //         } else {
    //             \Log::error('No se pudo crear el usuario');
    //             return response()->json(['error' => 'No se pudo crear el usuario'], 500);}
    //     } catch (\Exception $e) {
    //         \Log::error('Excepción al crear usuario:', ['mensaje' => $e->getMessage()]);
    //         return response()->json(['error' => 'Error al crear el usuario', 'detalle' => $e->getMessage()], 500);
    //     }
    // } 
    





















}
