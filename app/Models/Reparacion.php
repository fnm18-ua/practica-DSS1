<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['producto_id', 'fecha', 'descripcion', 'coste', 'proveedor_servicio', 'piezas_sustituidas'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
