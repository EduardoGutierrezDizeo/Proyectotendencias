<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cartera_clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('factura_id')->constrained('facturas')->onDelete('cascade'); 
            $table->decimal('saldo_pendiente', 10, 2);
            $table->date('fecha_limite');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cartera_clientes');
    }
};

