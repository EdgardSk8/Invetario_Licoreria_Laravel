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

# ----------------------------------------------------------------------------------------------------- #

# RUTA DE LOGIN Y LOGOUT #

Route::middleware('auth')->group(function () {
    Route::view('/Panel', 'panel')->name('panel');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

# ----------------------------------------------------------------------------------------------------- #
