// app/Models/Factura.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'facturas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'documento_adjunto_id',
        'numero',
        'comercio',
        'fecha_emision',
        'importe_total',
        'moneda'
    ];

    protected $casts = [
        'fecha_emision' => 'date',
        'importe_total' => 'decimal:2'
    ];

    // Relaciones
    public function documentoAdjunto(): BelongsTo
    {
        return $this->belongsTo(DocumentoAdjunto::class);
    }

    public function vinculosMovimiento(): HasMany
    {
        return $this->hasMany(VinculoFacturaMovimiento::class, 'factura_id');
    }
}