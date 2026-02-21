// app/Enums/TipoDocumento.php
<?php

namespace App\Enums;

enum TipoDocumento: string
{
    case FACTURA = 'FACTURA';
    case MANUAL = 'MANUAL';
    case TICKET = 'TICKET';
    case CERTIFICADO = 'CERTIFICADO';
    case FOTO = 'FOTO';
    case OTRO = 'OTRO';
}