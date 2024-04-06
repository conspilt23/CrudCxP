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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->enum('tipo_persona', ['Física', 'Jurídica'])->nullable();
            $table->string('cedula_rnc')->nullable();
            $table->decimal('balance', 10, 2)->default(0.00)->nullable();
            $table->boolean('estado')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
