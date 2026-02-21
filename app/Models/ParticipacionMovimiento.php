// app/Models/ParticipacionMovimiento.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipacionMovimiento extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'participaciones_movimiento';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'movimiento_financiero_id',
        'usuario_id',
        'porcentaje',
        'importe_asignado',
        'es_pagador'
    ];

    protected $casts = [
        'porcentaje' => 'float',
        'importe_asignado' => 'decimal:2',
        'es_pagador' => 'boolean'
    ];

    // Relaciones
    public function movimientoFinanciero(): BelongsTo
    {
        return $this->belongsTo(MovimientoFinanciero::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}