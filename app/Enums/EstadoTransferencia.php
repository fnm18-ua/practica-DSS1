<?php

namespace App\Enums;

enum EstadoTransferencia: string
{
    case INICIADA = 'iniciada';
    case ACEPTADA = 'aceptada';
    case RECHAZADA = 'rechazada';
    case CANCELADA = 'cancelada';
}
