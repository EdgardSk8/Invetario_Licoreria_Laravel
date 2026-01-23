<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';
    protected $fillable = ['id_venta', 'id_producto', 'cantidad_vendida', 'precio_unitario', 'subtotal'];

    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'id_venta', 'id_venta');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }
}
