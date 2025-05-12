<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteraCliente extends Model
{
    use HasFactory;

    protected $table = 'cartera_clientes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'cliente_id',
        'deuda_total',
        'abonos',
        'estado_deuda',
        'estado',
        'registrado_por',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
