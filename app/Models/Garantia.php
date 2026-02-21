// app/Models/Garantia.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Garantia extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'garantias';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'producto_id',
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'proveedor',
        'condiciones'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    // Relaciones
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}