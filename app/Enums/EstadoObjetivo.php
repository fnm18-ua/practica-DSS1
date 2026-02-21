<?php

namespace App\Enums;

enum EstadoObjetivo: string
{
    case EN_PROGRESO = 'en_progreso';
    case COMPLETADO = 'completado';
    case PAUSADO = 'pausado';
}
