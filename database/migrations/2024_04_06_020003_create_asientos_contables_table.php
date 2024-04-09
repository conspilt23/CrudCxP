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
        Schema::create('asientos_contables', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('tipo_inventario');
            $table->enum('tipo_movimiento', ['1', '2']);
            $table->enum('tipo_movimiento_2', ['1', '2']);
            $table->enum('cuenta_1', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20','21']);
            $table->enum('cuenta_2', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21']);
            $table->enum('moneda', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '47', '48', '49', '51']);
            $table->decimal('monto_asiento', 10, 2);
            $table->decimal('monto_asiento_2', 10, 2);
            $table->date('fecha_asiento');
            $table->enum('estado', ['1', '2', '3', '4', '5', '6', '7', '8']);
            $table->unsignedBigInteger('asiento_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asientos_contables');
    }
};
