<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsientoContable extends Model
{
    protected $table = 'asientos_contables';
    protected $fillable = ['descripcion', 'tipo_inventario', 'tipo_movimiento', 'fecha_asiento', 'monto_asiento', 'estado', 'asiento_id'];
}
