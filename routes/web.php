<?php

use Illuminate\Support\Facades\Route;

# ----------------------------------------------------------------------------------------------------- #

# INSERCION DE ARCHIVOS CONTROLADORES #

use App\Http\Controllers\LoginController;

# ----------------------------------------------------------------------------------------------------- #


// Route::get('/', function () { return view('welcome'); }); // Vista Welcome de Laravel

# ----------------------------------------------------------------------------------------------------- #

# RUTAS DE REDIRECCION DE VISTAS #

// Mandar al usuario a la pagina de login
Route::get('/', function () { return redirect('/login'); });

// Renderizar vista de login (Login.blade.php)
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/Principal', function () { return view('/vistas/principal'); })->name('principal');
Route::get('/Productos', function () { return view('/vistas/productos'); });
Route::get('/Categorias', function () { return view('/vistas/categorias'); })->name('categorias');
Route::get('/Proveedores', function () { return view('/vistas/proveedores'); })->name('proveedores');
Route::get('/Recibos', function () { return view('/vistas/recibos'); })->name(name: 'recibos');
Route::get('/Ventas', function () { return view('/vistas/ventas'); })->name(name: 'ventas');
Route::get('/Usuarios', function () { return view('/vistas/usuarios'); })->name('usuarios');

# ----------------------------------------------------------------------------------------------------- #

# RUTA DE LOGIN Y LOGOUT #

Route::middleware('auth')->group(function () {
    Route::view('/Panel', 'panel')->name('panel');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

# ----------------------------------------------------------------------------------------------------- #
