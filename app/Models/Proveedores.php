<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    protected $fillable = ['nombre_proveedor', 'telefono_proveedor', 'direccion_proveedor'];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_proveedor', 'id_proveedor');
    }
}
