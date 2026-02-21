<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PasaporteDigital extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['producto_id', 'codigo_unico'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con documentos (la añadiremos más tarde)
}
