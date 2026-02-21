// app/Enums/EstadoProducto.php
<?php

namespace App\Enums;

enum EstadoProducto: string
{
    case ACTIVO = 'ACTIVO';
    case ARCHIVADO = 'ARCHIVADO';
    case ELIMINADO = 'ELIMINADO';
}