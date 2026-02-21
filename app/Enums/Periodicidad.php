<?php

namespace App\Enums;

enum Periodicidad: string
{
    case SEMANAL = 'semanal';
    case MENSUAL = 'mensual';
    case TRIMESTRAL = 'trimestral';
    case ANUAL = 'anual';
}
