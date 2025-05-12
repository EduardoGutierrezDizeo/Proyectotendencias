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
        Schema::create('cartera_proveedores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');

            $table->decimal('cuenta_por_pagar', 12, 2);
            $table->decimal('abonos', 12, 2)->default(0);
            $table->decimal('saldo_pendiente', 12, 2);
            $table->date('fecha_limite');
            $table->boolean('estado');
            $table->string('estado_cuenta')->nullable(); // Opcional
            $table->string('registrado_por')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartera_proveedores');
    }
};
