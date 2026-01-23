<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre_usuario', 'usuario_login', 'contrasenia', 'id_rol'];
    protected $hidden = ['contrasenia', 'remember_token'];

    public function rol()
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id_rol');
    }

    public function ventas()
    {
        return $this->hasMany(Ventas::class, 'id_usuario', 'id_usuario');
    }
}
