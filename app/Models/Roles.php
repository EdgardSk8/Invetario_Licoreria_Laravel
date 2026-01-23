<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = ['nombre_rol', 'descripcion_rol'];

    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'id_rol', 'id_rol');
    }
}
