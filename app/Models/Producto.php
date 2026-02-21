<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['usuario_id', 'nombre', 'marca', 'modelo', 'fecha_compra', 'precio_compra'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function pasaporteDigital()
    {
        return $this->hasOne(PasaporteDigital::class);
    }

    public function garantia()
    {
        return $this->hasOne(Garantia::class);
    }

    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class);
    }
}
