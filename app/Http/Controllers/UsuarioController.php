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
        // ✅ Validaciones
        $request->validate([
            'nombre_usuario' => 'required|string|max:100',
            'usuario_login'  => 'required|string|max:50|unique:usuarios,usuario_login',
            'contrasenia'    => 'required|string|min:3|max:12',
            'documento_identificacion' => 'required|string|size:16',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|digits_between:8,15',
            'fecha_ingreso' => 'required|date',
            'id_rol' => 'required|exists:roles,id_rol',
        ]);

        Usuarios::create([
            'nombre_usuario' => $request->nombre_usuario,
            'usuario_login' => $request->usuario_login,
            'contrasenia' => Hash::make($request->contrasenia),
            'documento_identificacion' => $request->documento_identificacion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'fecha_ingreso' => $request->fecha_ingreso,
            'id_rol' => $request->id_rol,
        ]);

        return response()->json(['mensaje' => 'Usuario creado correctamente'], 201);
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

}
