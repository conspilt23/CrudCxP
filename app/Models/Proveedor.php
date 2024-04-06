<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{ protected $table = 'proveedores';
    protected $fillable = ['nombre', 'tipo_persona', 'cedula_rnc', 'balance', 'estado'];

    public function documentosPagar()
    {
        return $this->hasMany(DocumentoPagar::class);
    }
}
