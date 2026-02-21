// app/Models/DocumentoAdjunto.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentoAdjunto extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'documentos_adjuntos';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'usuario_id',
        'producto_id',
        'pasaporte_id',
        'tipo',
        'nombre_archivo',
        'ruta_archivo',
        'fecha_subida',
        'tipo_documentoable_type',
        'tipo_documentoable_id'
    ];

    protected $casts = [
        'fecha_subida' => 'date'
    ];

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function pasaporte(): BelongsTo
    {
        return $this->belongsTo(PasaporteDigital::class);
    }

    public function tipoDocumentoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function factura(): HasOne
    {
        return $this->hasOne(Factura::class, 'documento_adjunto_id');
    }

    public function gastosRecurrentes(): HasMany
    {
        return $this->hasMany(GastoRecurrente::class, 'doc_soporte_id');
    }
}