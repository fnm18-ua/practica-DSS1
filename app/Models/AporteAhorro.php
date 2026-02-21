// app/Models/AporteAhorro.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AporteAhorro extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'aportes_ahorro';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'objetivo_ahorro_id',
        'fecha',
        'importe',
        'nota'
    ];

    protected $casts = [
        'fecha' => 'date',
        'importe' => 'decimal:2'
    ];

    // Relaciones
    public function objetivoAhorro(): BelongsTo
    {
        return $this->belongsTo(ObjetivoAhorro::class);
    }
}