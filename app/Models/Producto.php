// app/Models/Producto.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Producto extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'productos';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'usuario_id',
        'nombre',
        'marca',
        'modelo',
        'numero_serie',
        'fecha_alta',
        'estado'
    ];

    protected $casts = [
        'fecha_alta' => 'date'
    ];

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function pasaporte(): HasOne
    {
        return $this->hasOne(PasaporteDigital::class);
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(DocumentoAdjunto::class);
    }

    public function garantia(): HasOne
    {
        return $this->hasOne(Garantia::class);
    }

    public function reparaciones(): HasMany
    {
        return $this->hasMany(Reparacion::class);
    }
}