// app/Models/GastoRecurrente.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GastoRecurrente extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'gastos_recurrentes';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'usuario_id',
        'doc_soporte_id',
        'nombre',
        'importe',
        'periodicidad',
        'proxima_fecha',
        'activo'
    ];

    protected $casts = [
        'importe' => 'decimal:2',
        'proxima_fecha' => 'date',
        'activo' => 'boolean'
    ];

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function documentoSoporte(): BelongsTo
    {
        return $this->belongsTo(DocumentoAdjunto::class, 'doc_soporte_id');
    }
}