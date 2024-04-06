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
        Schema::create('documentos_pagar', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento');
            $table->string('numero_factura');
            $table->date('fecha_documento');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_registro');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->foreignId('concepto_id')->constrained('conceptos');
            $table->enum('estado', ['Pendiente', 'Pagado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_pagar');
    }
};
