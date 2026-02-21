// app/Models/MovimientoFinanciero.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MovimientoFinanciero extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'movimientos_financieros';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'usuario_id',
        'categoria_id',
        'grupo_id',
        'tipo',
        'importe',
        'fecha',
        'descripcion',
        'origen'
    ];

    protected $casts = [
        'fecha' => 'date',
        'importe' => 'decimal:2'
    ];

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class);
    }

    public function participaciones(): HasMany
    {
        return $this->hasMany(ParticipacionMovimiento::class);
    }

    public function vinculosFactura(): HasMany
    {
        return $this->hasMany(VinculoFacturaMovimiento::class);
    }
}