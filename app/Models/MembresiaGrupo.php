<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EstadoMembresia;
use App\Enums\RolMembresia;

class MembresiaGrupo extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['usuario_id', 'grupo_id', 'estado', 'rol'];

    protected $casts = [
        'estado' => EstadoMembresia::class,
        'rol' => RolMembresia::class,
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
