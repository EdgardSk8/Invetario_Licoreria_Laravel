<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario_login' => 'required',
            'contrasenia' => 'required'
        ]);

        $credentials = [
            'usuario_login' => $request->usuario_login,
            'password' => $request->contrasenia,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('panel');
        }

        return back()->withErrors([
            'login' => 'Usuario o contraseña incorrectos'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
