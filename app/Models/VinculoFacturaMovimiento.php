// app/Models/VinculoFacturaMovimiento.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VinculoFacturaMovimiento extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'vinculos_factura_movimiento';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'movimiento_financiero_id',
        'factura_id',
        'importe_imputado',
        'nota'
    ];

    protected $casts = [
        'importe_imputado' => 'decimal:2'
    ];

    // Relaciones
    public function movimientoFinanciero(): BelongsTo
    {
        return $this->belongsTo(MovimientoFinanciero::class);
    }

    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class);
    }
}