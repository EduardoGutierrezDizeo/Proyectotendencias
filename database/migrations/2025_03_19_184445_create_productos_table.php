<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio_compra');
            $table->decimal('precio_venta');
            $table->integer('stock')->default(0);
            $table->string('categoria')->nullable();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->boolean('estado');
            $table->string('registrado_por');
            $table->integer('stock_minimo')->default(10); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

