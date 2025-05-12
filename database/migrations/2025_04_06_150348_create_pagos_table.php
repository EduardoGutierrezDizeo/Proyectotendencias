<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            // Campos principales
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('cliente_id');
            $table->decimal('monto_pago', 8, 2);
            $table->timestamp('fecha_pago');
            $table->string('metodo_pago')->default('efectivo');
            $table->unsignedBigInteger('registrado_por');

            $table->timestamps();

            // Llaves foráneas
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('registrado_por')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
