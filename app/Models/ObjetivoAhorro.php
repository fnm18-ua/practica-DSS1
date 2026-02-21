// app/Models/ObjetivoAhorro.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjetivoAhorro extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'objetivos_ahorro';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'usuario_id',
        'nombre',
        'cantidad_objetivo',
        'cantidad_actual',
        'fecha_inicio',
        'fecha_limite',
        'estado'
    ];

    protected $casts = [
        'cantidad_objetivo' => 'decimal:2',
        'cantidad_actual' => 'decimal:2',
        'fecha_inicio' => 'date',
        'fecha_limite' => 'date'
    ];

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function aportes(): HasMany
    {
        return $this->hasMany(AporteAhorro::class);
    }
}