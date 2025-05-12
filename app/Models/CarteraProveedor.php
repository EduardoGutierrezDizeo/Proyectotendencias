<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteraProveedor extends Model
{
    use HasFactory;

    protected $table = 'cartera_proveedores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'proveedor_id',
        'cuenta_por_pagar',
        'abonos',
        'estado_cuenta',
        'estado',
        'registrado_por',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
