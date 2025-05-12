<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'nit',
        'correo_electronico',
        'credito_disponible',
        'deuda_actual',
        'estado',
        'registrado_por',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function carteraCliente()
    {
        return $this->hasOne(CarteraCliente::class);
    }

    public function pagos()
    {
    return $this->hasMany(Pago::class);
    }

}
