<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'telefono',
        'correo_electronico',
        'fecha_registro',
        'estado',
        'registrado_por',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
