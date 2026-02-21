<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoGarantia;

class Garantia extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['producto_id', 'fecha_inicio', 'fecha_fin', 'tipo', 'proveedor', 'condiciones'];

    protected $casts = [
        'tipo' => TipoGarantia::class,
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
