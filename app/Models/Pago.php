<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'cliente_id',
        'monto_pago',
        'fecha_pago',
        'metodo_pago',
        'registrado_por',
    ];

    // Relación con factura
    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con el usuario que registró el pago
    public function registradoPor()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }
}
