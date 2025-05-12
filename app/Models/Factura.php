<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    
    protected $table = 'facturas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_cliente',
        'nit_cliente',
        'telefono_cliente',
        'nombre_negocio',
        'ruta',
        'fecha_venta',
        'subtotal',
        'total_factura',
        'cliente_id',
        'vendedor_id',
        'estado',
        'registrado_por',
    ];

    public function pagos()
    {
    return $this->hasMany(Pago::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function detalleFacturas()
    {
        return $this->hasMany(DetalleFactura::class);
    }


}
