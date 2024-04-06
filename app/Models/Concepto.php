<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $fillable = ['descripcion', 'estado'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function documentosPagar()
    {
        return $this->hasMany(DocumentoPagar::class); // Corregido de 'belongsTo' a 'hasMany'
    }

}


