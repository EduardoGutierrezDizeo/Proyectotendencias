<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'fecha_compra',
        'total_compra',
        'estado',
        'registrado_por',
    ];

    // Relación con proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    // Relación con el usuario que registró la compra
    public function registradoPor()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    // (Más adelante) Relación con detalle_compra
    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class);
    }
    public function detalleCompras()
{
    return $this->hasMany(DetalleCompra::class, 'compra_id');
}
}
