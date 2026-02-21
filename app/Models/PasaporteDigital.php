// app/Models/PasaporteDigital.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasaporteDigital extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pasaportes_digitales';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'producto_id',
        'codigo',
        'fecha_creacion',
        'hash_validacion',
        'es_transferible'
    ];

    protected $casts = [
        'fecha_creacion' => 'date',
        'es_transferible' => 'boolean'
    ];

    // Relaciones
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function referencias(): HasMany
    {
        return $this->hasMany(DocumentoAdjunto::class, 'pasaporte_id');
    }

    public function transferencias(): HasMany
    {
        return $this->hasMany(TransferenciaPasaporte::class, 'pasaporte_id');
    }
}