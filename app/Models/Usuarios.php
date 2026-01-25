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

    protected $fillable = [
        'nombre_usuario',
        'usuario_login',
        'contrasenia',
        'documento_identificacion',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'fecha_ingreso',
        'id_rol'
    ];

    protected $hidden = [
        'contrasenia',
        'remember_token'
    ];

    // Relación con roles
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id_rol');
    }

    // Relación con ventas
    public function ventas()
    {
        return $this->hasMany(Ventas::class, 'id_usuario', 'id_usuario');
    }

    // Autenticación usando el campo "contrasenia"
    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    /**
     * Accesor: días que lleva registrado el usuario
     */
    public function getDiasRegistradoAttribute()
    {
        return now()->diffInDays($this->fecha_ingreso);
    }
}
