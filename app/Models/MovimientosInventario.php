<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientosInventario extends Model
{
    use HasFactory;

    protected $table = 'movimientos_inventario';
    protected $primaryKey = 'id_movimiento';
    protected $fillable = ['id_producto', 'tipo_movimiento', 'cantidad_movimiento', 'fecha_movimiento', 'descripcion_movimiento'];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }
}
