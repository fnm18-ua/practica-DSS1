// app/Models/TransferenciaPasaporte.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransferenciaPasaporte extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transferencias_pasaporte';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'pasaporte_id',
        'vendedor_id',
        'comprador_id',
        'fecha',
        'estado',
        'token_verificacion'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    // Relaciones
    public function pasaporte(): BelongsTo
    {
        return $this->belongsTo(PasaporteDigital::class, 'pasaporte_id');
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'vendedor_id');
    }

    public function comprador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'comprador_id');
    }
}