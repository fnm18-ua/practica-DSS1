<?php

namespace App\Enums;

enum EstadoMembresia: string
{
    case PENDIENTE = 'pendiente';
    case ACTIVA = 'activa';
    case BLOQUEADA = 'bloqueada';
}
