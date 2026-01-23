<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre_producto', 
        'marca_producto', 
        'precio_compra', 
        'precio_venta', 
        'stock_producto', 
        'id_categoria', 
        'id_proveedor'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria', 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor', 'id_proveedor');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'id_producto', 'id_producto');
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientosInventario::class, 'id_producto', 'id_producto');
    }
}
