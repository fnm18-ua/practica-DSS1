// app/Models/Usuario.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'usuarios';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nombre',
        'email',
        'fecha_registro'
    ];

    protected $casts = [
        'fecha_registro' => 'date'
    ];

    // Relaciones (parte del modelo de dominio)
    public function membresias(): HasMany
    {
        return $this->hasMany(MembresiaGrupo::class);
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(DocumentoAdjunto::class);
    }

    public function movimientos(): HasMany
    {
        return $this->hasMany(MovimientoFinanciero::class);
    }

    public function participaciones(): HasMany
    {
        return $this->hasMany(ParticipacionMovimiento::class);
    }

    public function gastosRecurrentes(): HasMany
    {
        return $this->hasMany(GastoRecurrente::class);
    }

    public function objetivosAhorro(): HasMany
    {
        return $this->hasMany(ObjetivoAhorro::class);
    }

    public function transferenciasComoVendedor(): HasMany
    {
        return $this->hasMany(TransferenciaPasaporte::class, 'vendedor_id');
    }

    public function transferenciasComoComprador(): HasMany
    {
        return $this->hasMany(TransferenciaPasaporte::class, 'comprador_id');
    }
}