<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoPagar extends Model
{
    protected $table = 'documentos_pagar';
    protected $fillable = ['numero_documento', 'numero_factura', 'fecha_documento', 'monto', 'fecha_registro', 'proveedor_id', 'concepto_id', 'estado'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }
}

