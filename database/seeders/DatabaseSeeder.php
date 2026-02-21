<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Grupo;
use App\Models\MembresiaGrupo;
use App\Models\Producto;
use App\Models\PasaporteDigital;
use App\Models\DocumentoAdjunto;
use App\Models\Factura;
use App\Models\Garantia;
use App\Models\Reparacion;
use App\Models\Categoria;
use App\Models\MovimientoFinanciero;
use App\Models\ParticipacionMovimiento;
use App\Models\VinculoFacturaMovimiento;
use App\Models\GastoRecurrente;
use App\Models\ObjetivoAhorro;
use App\Models\AporteAhorro;
use App\Models\TransferenciaPasaporte;
use App\Enums\RolGrupo;
use App\Enums\EstadoMembresia;
use App\Enums\EstadoProducto;
use App\Enums\TipoDocumento;
use App\Enums\TipoGarantia;
use App\Enums\TipoMovimiento;
use App\Enums\Periodicidad;
use App\Enums\EstadoObjetivo;
use App\Enums\EstadoTransferencia;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // 1. CREAR USUARIOS
        // ============================================
        $usuario1 = Usuario::create([
            'id' => Str::uuid(),
            'nombre' => 'Ana García',
            'email' => 'ana.garcia@email.com',
            'fecha_registro' => Carbon::now()->subMonths(8)
        ]);

        $usuario2 = Usuario::create([
            'id' => Str::uuid(),
            'nombre' => 'Carlos López',
            'email' => 'carlos.lopez@email.com',
            'fecha_registro' => Carbon::now()->subMonths(6)
        ]);

        $usuario3 = Usuario::create([
            'id' => Str::uuid(),
            'nombre' => 'Marta Sánchez',
            'email' => 'marta.sanchez@email.com',
            'fecha_registro' => Carbon::now()->subMonths(4)
        ]);

        $usuario4 = Usuario::create([
            'id' => Str::uuid(),
            'nombre' => 'Javier Ruiz',
            'email' => 'javier.ruiz@email.com',
            'fecha_registro' => Carbon::now()->subMonths(2)
        ]);

        $usuario5 = Usuario::create([
            'id' => Str::uuid(),
            'nombre' => 'Laura Martínez',
            'email' => 'laura.martinez@email.com',
            'fecha_registro' => Carbon::now()->subMonths(1)
        ]);

        // ============================================
        // 2. CREAR GRUPOS
        // ============================================
        $grupo1 = Grupo::create([
            'id' => Str::uuid(),
            'nombre' => 'Familia García',
            'fecha_creacion' => Carbon::now()->subMonths(7)
        ]);

        $grupo2 = Grupo::create([
            'id' => Str::uuid(),
            'nombre' => 'Compañeros de piso',
            'fecha_creacion' => Carbon::now()->subMonths(5)
        ]);

        $grupo3 = Grupo::create([
            'id' => Str::uuid(),
            'nombre' => 'Amigos de viaje',
            'fecha_creacion' => Carbon::now()->subMonths(3)
        ]);

        // ============================================
        // 3. CREAR MEMBRESÍAS DE GRUPO
        // ============================================
        // Grupo 1 - Familia García
        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'grupo_id' => $grupo1->id,
            'fecha_alta' => Carbon::now()->subMonths(7),
            'rol' => RolGrupo::ADMIN,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'grupo_id' => $grupo1->id,
            'fecha_alta' => Carbon::now()->subMonths(7),
            'rol' => RolGrupo::MIEMBRO,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        // Grupo 2 - Compañeros de piso
        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'grupo_id' => $grupo2->id,
            'fecha_alta' => Carbon::now()->subMonths(5),
            'rol' => RolGrupo::ADMIN,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'grupo_id' => $grupo2->id,
            'fecha_alta' => Carbon::now()->subMonths(5),
            'rol' => RolGrupo::MIEMBRO,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario4->id,
            'grupo_id' => $grupo2->id,
            'fecha_alta' => Carbon::now()->subMonths(4),
            'rol' => RolGrupo::MIEMBRO,
            'estado' => EstadoMembresia::PENDIENTE
        ]);

        // Grupo 3 - Amigos de viaje
        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'grupo_id' => $grupo3->id,
            'fecha_alta' => Carbon::now()->subMonths(3),
            'rol' => RolGrupo::ADMIN,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'grupo_id' => $grupo3->id,
            'fecha_alta' => Carbon::now()->subMonths(3),
            'rol' => RolGrupo::MIEMBRO,
            'estado' => EstadoMembresia::ACTIVA
        ]);

        MembresiaGrupo::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario5->id,
            'grupo_id' => $grupo3->id,
            'fecha_alta' => Carbon::now()->subMonths(2),
            'rol' => RolGrupo::MIEMBRO,
            'estado' => EstadoMembresia::BLOQUEADA
        ]);

        // ============================================
        // 4. CREAR PRODUCTOS
        // ============================================
        // Productos de Ana (usuario1)
        $producto1 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'nombre' => 'Portátil MacBook Pro',
            'marca' => 'Apple',
            'modelo' => 'M1 Pro 14"',
            'numero_serie' => 'ABC123XYZ789',
            'fecha_alta' => Carbon::now()->subMonths(6),
            'estado' => EstadoProducto::ACTIVO
        ]);

        $producto2 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'nombre' => 'Smart TV Samsung',
            'marca' => 'Samsung',
            'modelo' => 'QLED 55"',
            'numero_serie' => 'TV7890LMN456',
            'fecha_alta' => Carbon::now()->subMonths(5),
            'estado' => EstadoProducto::ACTIVO
        ]);

        $producto3 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'nombre' => 'Auriculares Sony',
            'marca' => 'Sony',
            'modelo' => 'WH-1000XM4',
            'numero_serie' => 'SONY123456',
            'fecha_alta' => Carbon::now()->subMonths(4),
            'estado' => EstadoProducto::ARCHIVADO
        ]);

        // Productos de Carlos (usuario2)
        $producto4 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'nombre' => 'iPhone 14 Pro',
            'marca' => 'Apple',
            'modelo' => 'Pro Max',
            'numero_serie' => 'IPHONE5678',
            'fecha_alta' => Carbon::now()->subMonths(4),
            'estado' => EstadoProducto::ACTIVO
        ]);

        $producto5 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'nombre' => 'iPad Air',
            'marca' => 'Apple',
            'modelo' => '5ª generación',
            'numero_serie' => 'IPAD9012',
            'fecha_alta' => Carbon::now()->subMonths(3),
            'estado' => EstadoProducto::ACTIVO
        ]);

        // Productos de Marta (usuario3)
        $producto6 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'nombre' => 'Bicicleta eléctrica',
            'marca' => 'Orbea',
            'modelo' => 'Katu-e 20',
            'numero_serie' => 'ORB12345',
            'fecha_alta' => Carbon::now()->subMonths(3),
            'estado' => EstadoProducto::ACTIVO
        ]);

        $producto7 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'nombre' => 'Cámara réflex',
            'marca' => 'Canon',
            'modelo' => 'EOS 90D',
            'numero_serie' => 'CANON67890',
            'fecha_alta' => Carbon::now()->subMonths(2),
            'estado' => EstadoProducto::ACTIVO
        ]);

        // Productos de Javier (usuario4)
        $producto8 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario4->id,
            'nombre' => 'Consola PlayStation 5',
            'marca' => 'Sony',
            'modelo' => 'Digital Edition',
            'numero_serie' => 'PS5-12345',
            'fecha_alta' => Carbon::now()->subMonths(2),
            'estado' => EstadoProducto::ACTIVO
        ]);

        $producto9 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario4->id,
            'nombre' => 'Monitor gaming',
            'marca' => 'ASUS',
            'modelo' => 'ROG 27"',
            'numero_serie' => 'ASUS7890',
            'fecha_alta' => Carbon::now()->subMonths(1),
            'estado' => EstadoProducto::ACTIVO
        ]);

        // Producto de Laura (usuario5)
        $producto10 = Producto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario5->id,
            'nombre' => 'Kindle Paperwhite',
            'marca' => 'Amazon',
            'modelo' => '11ª generación',
            'numero_serie' => 'KINDLE123',
            'fecha_alta' => Carbon::now()->subWeeks(2),
            'estado' => EstadoProducto::ACTIVO
        ]);

        // ============================================
        // 5. CREAR PASAPORTES DIGITALES
        // ============================================
        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto1->id,
            'codigo' => 'PAS-2025-001',
            'fecha_creacion' => Carbon::now()->subMonths(6),
            'hash_validacion' => hash('sha256', 'PAS-2025-001-' . $producto1->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto2->id,
            'codigo' => 'PAS-2025-002',
            'fecha_creacion' => Carbon::now()->subMonths(5),
            'hash_validacion' => hash('sha256', 'PAS-2025-002-' . $producto2->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto3->id,
            'codigo' => 'PAS-2025-003',
            'fecha_creacion' => Carbon::now()->subMonths(4),
            'hash_validacion' => hash('sha256', 'PAS-2025-003-' . $producto3->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto4->id,
            'codigo' => 'PAS-2025-004',
            'fecha_creacion' => Carbon::now()->subMonths(4),
            'hash_validacion' => hash('sha256', 'PAS-2025-004-' . $producto4->id),
            'es_transferible' => false
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto5->id,
            'codigo' => 'PAS-2025-005',
            'fecha_creacion' => Carbon::now()->subMonths(3),
            'hash_validacion' => hash('sha256', 'PAS-2025-005-' . $producto5->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto6->id,
            'codigo' => 'PAS-2025-006',
            'fecha_creacion' => Carbon::now()->subMonths(3),
            'hash_validacion' => hash('sha256', 'PAS-2025-006-' . $producto6->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto7->id,
            'codigo' => 'PAS-2025-007',
            'fecha_creacion' => Carbon::now()->subMonths(2),
            'hash_validacion' => hash('sha256', 'PAS-2025-007-' . $producto7->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto8->id,
            'codigo' => 'PAS-2025-008',
            'fecha_creacion' => Carbon::now()->subMonths(2),
            'hash_validacion' => hash('sha256', 'PAS-2025-008-' . $producto8->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto9->id,
            'codigo' => 'PAS-2025-009',
            'fecha_creacion' => Carbon::now()->subMonths(1),
            'hash_validacion' => hash('sha256', 'PAS-2025-009-' . $producto9->id),
            'es_transferible' => true
        ]);

        PasaporteDigital::create([
            'id' => Str::uuid(),
            'producto_id' => $producto10->id,
            'codigo' => 'PAS-2025-010',
            'fecha_creacion' => Carbon::now()->subWeeks(2),
            'hash_validacion' => hash('sha256', 'PAS-2025-010-' . $producto10->id),
            'es_transferible' => false
        ]);

        // ============================================
        // 6. CREAR DOCUMENTOS ADJUNTOS
        // ============================================
        // Documentos para producto1 (MacBook)
        $doc1 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'producto_id' => $producto1->id,
            'tipo' => TipoDocumento::FACTURA,
            'nombre_archivo' => 'factura_macbook_pro.pdf',
            'ruta_archivo' => '/documentos/ana/facturas/factura_macbook_pro.pdf',
            'fecha_subida' => Carbon::now()->subMonths(6)
        ]);

        $doc2 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'producto_id' => $producto1->id,
            'tipo' => TipoDocumento::MANUAL,
            'nombre_archivo' => 'manual_macbook_pro.pdf',
            'ruta_archivo' => '/documentos/ana/manuales/manual_macbook_pro.pdf',
            'fecha_subida' => Carbon::now()->subMonths(6)
        ]);

        // Documentos para producto2 (TV Samsung)
        $doc3 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'producto_id' => $producto2->id,
            'tipo' => TipoDocumento::FACTURA,
            'nombre_archivo' => 'factura_tv_samsung.pdf',
            'ruta_archivo' => '/documentos/ana/facturas/factura_tv_samsung.pdf',
            'fecha_subida' => Carbon::now()->subMonths(5)
        ]);

        $doc4 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'producto_id' => $producto2->id,
            'tipo' => TipoDocumento::MANUAL,
            'nombre_archivo' => 'manual_tv_samsung.pdf',
            'ruta_archivo' => '/documentos/ana/manuales/manual_tv_samsung.pdf',
            'fecha_subida' => Carbon::now()->subMonths(5)
        ]);

        $doc5 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'producto_id' => $producto2->id,
            'tipo' => TipoDocumento::CERTIFICADO,
            'nombre_archivo' => 'certificado_energetico.pdf',
            'ruta_archivo' => '/documentos/ana/certificados/certificado_energetico.pdf',
            'fecha_subida' => Carbon::now()->subMonths(5)
        ]);

        // Documentos para producto4 (iPhone)
        $doc6 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'producto_id' => $producto4->id,
            'tipo' => TipoDocumento::FACTURA,
            'nombre_archivo' => 'factura_iphone.pdf',
            'ruta_archivo' => '/documentos/carlos/facturas/factura_iphone.pdf',
            'fecha_subida' => Carbon::now()->subMonths(4)
        ]);

        // Documento sin producto (solo para el usuario)
        $doc7 = DocumentoAdjunto::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'producto_id' => null,
            'tipo' => TipoDocumento::OTRO,
            'nombre_archivo' => 'contrato_alquiler.pdf',
            'ruta_archivo' => '/documentos/marta/contrato_alquiler.pdf',
            'fecha_subida' => Carbon::now()->subMonths(3)
        ]);

        // ============================================
        // 7. CREAR FACTURAS (especialización de DocumentoAdjunto)
        // ============================================
        Factura::create([
            'id' => Str::uuid(),
            'documento_adjunto_id' => $doc1->id,
            'numero' => 'F-2025-001',
            'comercio' => 'Apple Store',
            'fecha_emision' => Carbon::now()->subMonths(6),
            'importe_total' => 2499.99,
            'moneda' => 'EUR'
        ]);

        Factura::create([
            'id' => Str::uuid(),
            'documento_adjunto_id' => $doc3->id,
            'numero' => 'F-2025-002',
            'comercio' => 'MediaMarkt',
            'fecha_emision' => Carbon::now()->subMonths(5),
            'importe_total' => 899.50,
            'moneda' => 'EUR'
        ]);

        Factura::create([
            'id' => Str::uuid(),
            'documento_adjunto_id' => $doc6->id,
            'numero' => 'F-2025-003',
            'comercio' => 'Movistar',
            'fecha_emision' => Carbon::now()->subMonths(4),
            'importe_total' => 1200.00,
            'moneda' => 'EUR'
        ]);

        // ============================================
        // 8. CREAR GARANTÍAS
        // ============================================
        Garantia::create([
            'id' => Str::uuid(),
            'producto_id' => $producto1->id,
            'fecha_inicio' => Carbon::now()->subMonths(6),
            'fecha_fin' => Carbon::now()->addMonths(18),
            'tipo' => TipoGarantia::COMERCIAL,
            'proveedor' => 'Apple Care+',
            'condiciones' => 'Cobertura completa incluyendo daños accidentales'
        ]);

        Garantia::create([
            'id' => Str::uuid(),
            'producto_id' => $producto2->id,
            'fecha_inicio' => Carbon::now()->subMonths(5),
            'fecha_fin' => Carbon::now()->addMonths(19),
            'tipo' => TipoGarantia::LEGAL,
            'proveedor' => 'Samsung',
            'condiciones' => 'Garantía legal de 2 años'
        ]);

        Garantia::create([
            'id' => Str::uuid(),
            'producto_id' => $producto4->id,
            'fecha_inicio' => Carbon::now()->subMonths(4),
            'fecha_fin' => Carbon::now()->addMonths(8),
            'tipo' => TipoGarantia::EXTENDIDA,
            'proveedor' => 'SegurosXYZ',
            'condiciones' => 'Garantía extendida por robo y rotura'
        ]);

        // ============================================
        // 9. CREAR REPARACIONES
        // ============================================
        Reparacion::create([
            'id' => Str::uuid(),
            'producto_id' => $producto1->id,
            'fecha' => Carbon::now()->subMonths(2),
            'descripcion' => 'Cambio de pantalla',
            'coste' => 450.00,
            'proveedor_servicio' => 'SAT Apple',
            'piezas_sustituidas' => 'Pantalla Liquid Retina XDR'
        ]);

        Reparacion::create([
            'id' => Str::uuid(),
            'producto_id' => $producto1->id,
            'fecha' => Carbon::now()->subWeeks(1),
            'descripcion' => 'Revisión teclado',
            'coste' => 0.00,
            'proveedor_servicio' => 'Apple Store',
            'piezas_sustituidas' => null
        ]);

        Reparacion::create([
            'id' => Str::uuid(),
            'producto_id' => $producto4->id,
            'fecha' => Carbon::now()->subMonth(),
            'descripcion' => 'Cambio de batería',
            'coste' => 89.00,
            'proveedor_servicio' => 'PhoneHouse',
            'piezas_sustituidas' => 'Batería de litio'
        ]);

        // ============================================
        // 10. CREAR CATEGORÍAS FINANCIERAS
        // ============================================
        $categoria1 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Nómina',
            'tipo' => TipoMovimiento::INGRESO
        ]);

        $categoria2 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Alquiler',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria3 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Supermercado',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria4 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Restaurantes',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria5 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Transporte',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria6 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Ocio',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria7 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Facturas Hogar',
            'tipo' => TipoMovimiento::GASTO
        ]);

        $categoria8 = Categoria::create([
            'id' => Str::uuid(),
            'nombre' => 'Inversiones',
            'tipo' => TipoMovimiento::INGRESO
        ]);

        // ============================================
        // 11. CREAR MOVIMIENTOS FINANCIEROS
        // ============================================
        // Movimientos individuales de Ana
        $mov1 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'categoria_id' => $categoria1->id,
            'grupo_id' => null,
            'tipo' => TipoMovimiento::INGRESO,
            'importe' => 2500.00,
            'fecha' => Carbon::now()->startOfMonth(),
            'descripcion' => 'Nómina febrero',
            'origen' => 'Empresa ABC'
        ]);

        $mov2 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'categoria_id' => $categoria3->id,
            'grupo_id' => null,
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 85.30,
            'fecha' => Carbon::now()->subDays(5),
            'descripcion' => 'Compra Mercadona',
            'origen' => 'Tarjeta'
        ]);

        $mov3 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'categoria_id' => $categoria7->id,
            'grupo_id' => null,
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 45.99,
            'fecha' => Carbon::now()->subDays(10),
            'descripcion' => 'Factura luz',
            'origen' => 'Domiciliación'
        ]);

        // Movimientos de Carlos
        $mov4 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'categoria_id' => $categoria1->id,
            'grupo_id' => null,
            'tipo' => TipoMovimiento::INGRESO,
            'importe' => 1800.00,
            'fecha' => Carbon::now()->startOfMonth(),
            'descripcion' => 'Nómina febrero',
            'origen' => 'Empresa XYZ'
        ]);

        $mov5 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'categoria_id' => $categoria4->id,
            'grupo_id' => null,
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 35.50,
            'fecha' => Carbon::now()->subDays(3),
            'descripcion' => 'Cena restaurante',
            'origen' => 'Efectivo'
        ]);

        // Movimientos de grupo (compartidos)
        $mov6 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id, // Quien registra el movimiento
            'categoria_id' => $categoria2->id,
            'grupo_id' => $grupo2->id, // Compañeros de piso
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 800.00,
            'fecha' => Carbon::now()->startOfMonth(),
            'descripcion' => 'Alquiler febrero',
            'origen' => 'Transferencia'
        ]);

        $mov7 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'categoria_id' => $categoria7->id,
            'grupo_id' => $grupo2->id,
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 120.50,
            'fecha' => Carbon::now()->subDays(15),
            'descripcion' => 'Factura agua + internet',
            'origen' => 'Domiciliación'
        ]);

        $mov8 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'categoria_id' => $categoria6->id,
            'grupo_id' => $grupo3->id, // Amigos de viaje
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 350.00,
            'fecha' => Carbon::now()->subDays(20),
            'descripcion' => 'Reserva alojamiento viaje',
            'origen' => 'Tarjeta'
        ]);

        $mov9 = MovimientoFinanciero::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'categoria_id' => $categoria6->id,
            'grupo_id' => $grupo3->id,
            'tipo' => TipoMovimiento::GASTO,
            'importe' => 120.00,
            'fecha' => Carbon::now()->subDays(18),
            'descripcion' => 'Transporte viaje',
            'origen' => 'PayPal'
        ]);

        // ============================================
        // 12. CREAR PARTICIPACIONES EN MOVIMIENTOS
        // ============================================
        // Participación en alquiler (mov6)
        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov6->id,
            'usuario_id' => $usuario2->id,
            'porcentaje' => 50.0,
            'importe_asignado' => 400.00,
            'es_pagador' => true
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov6->id,
            'usuario_id' => $usuario3->id,
            'porcentaje' => 50.0,
            'importe_asignado' => 400.00,
            'es_pagador' => false
        ]);

        // Participación en facturas (mov7)
        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov7->id,
            'usuario_id' => $usuario2->id,
            'porcentaje' => 50.0,
            'importe_asignado' => 60.25,
            'es_pagador' => true
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov7->id,
            'usuario_id' => $usuario3->id,
            'porcentaje' => 50.0,
            'importe_asignado' => 60.25,
            'es_pagador' => false
        ]);

        // Participación en viaje (mov8)
        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov8->id,
            'usuario_id' => $usuario1->id,
            'porcentaje' => 33.33,
            'importe_asignado' => 116.67,
            'es_pagador' => true
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov8->id,
            'usuario_id' => $usuario3->id,
            'porcentaje' => 33.33,
            'importe_asignado' => 116.67,
            'es_pagador' => false
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov8->id,
            'usuario_id' => $usuario5->id,
            'porcentaje' => 33.34,
            'importe_asignado' => 116.66,
            'es_pagador' => false
        ]);

        // Participación en transporte (mov9)
        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov9->id,
            'usuario_id' => $usuario3->id,
            'porcentaje' => 33.33,
            'importe_asignado' => 40.00,
            'es_pagador' => true
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov9->id,
            'usuario_id' => $usuario1->id,
            'porcentaje' => 33.33,
            'importe_asignado' => 40.00,
            'es_pagador' => false
        ]);

        ParticipacionMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov9->id,
            'usuario_id' => $usuario5->id,
            'porcentaje' => 33.34,
            'importe_asignado' => 40.00,
            'es_pagador' => false
        ]);

        // ============================================
        // 13. CREAR VÍNCULOS FACTURA-MOVIMIENTO
        // ============================================
        VinculoFacturaMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov1->id,
            'factura_id' => Factura::where('documento_adjunto_id', $doc1->id)->first()->id,
            'importe_imputado' => 2499.99,
            'nota' => 'Compra MacBook Pro'
        ]);

        VinculoFacturaMovimiento::create([
            'id' => Str::uuid(),
            'movimiento_financiero_id' => $mov3->id,
            'factura_id' => Factura::where('documento_adjunto_id', $doc3->id)->first()->id,
            'importe_imputado' => 45.99,
            'nota' => 'Factura luz'
        ]);

        // ============================================
        // 14. CREAR GASTOS RECURRENTES
        // ============================================
        GastoRecurrente::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'doc_soporte_id' => $doc3->id,
            'nombre' => 'Cuota gimnasio',
            'importe' => 45.00,
            'periodicidad' => Periodicidad::MENSUAL,
            'proxima_fecha' => Carbon::now()->addMonth()->startOfMonth(),
            'activo' => true
        ]);

        GastoRecurrente::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'doc_soporte_id' => null,
            'nombre' => 'Netflix',
            'importe' => 15.99,
            'periodicidad' => Periodicidad::MENSUAL,
            'proxima_fecha' => Carbon::now()->addDays(15),
            'activo' => true
        ]);

        GastoRecurrente::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'doc_soporte_id' => null,
            'nombre' => 'Spotify',
            'importe' => 9.99,
            'periodicidad' => Periodicidad::MENSUAL,
            'proxima_fecha' => Carbon::now()->addDays(5),
            'activo' => true
        ]);

        GastoRecurrente::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'doc_soporte_id' => null,
            'nombre' => 'Suscripción Creative Cloud',
            'importe' => 60.00,
            'periodicidad' => Periodicidad::MENSUAL,
            'proxima_fecha' => Carbon::now()->addDays(10),
            'activo' => true
        ]);

        GastoRecurrente::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario4->id,
            'doc_soporte_id' => null,
            'nombre' => 'Xbox Game Pass',
            'importe' => 10.99,
            'periodicidad' => Periodicidad::MENSUAL,
            'proxima_fecha' => Carbon::now()->addDays(20),
            'activo' => false
        ]);

        // ============================================
        // 15. CREAR OBJETIVOS DE AHORRO
        // ============================================
        $objetivo1 = ObjetivoAhorro::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario1->id,
            'nombre' => 'Viaje a Japón',
            'cantidad_objetivo' => 3000.00,
            'cantidad_actual' => 1200.00,
            'fecha_inicio' => Carbon::now()->subMonths(3),
            'fecha_limite' => Carbon::now()->addMonths(6),
            'estado' => EstadoObjetivo::EN_PROGRESO
        ]);

        $objetivo2 = ObjetivoAhorro::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario2->id,
            'nombre' => 'Coche nuevo',
            'cantidad_objetivo' => 15000.00,
            'cantidad_actual' => 3500.00,
            'fecha_inicio' => Carbon::now()->subMonths(6),
            'fecha_limite' => Carbon::now()->addYear(),
            'estado' => EstadoObjetivo::EN_PROGRESO
        ]);

        $objetivo3 = ObjetivoAhorro::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario3->id,
            'nombre' => 'Fondo de emergencia',
            'cantidad_objetivo' => 5000.00,
            'cantidad_actual' => 5000.00,
            'fecha_inicio' => Carbon::now()->subYear(),
            'fecha_limite' => Carbon::now()->subMonths(1),
            'estado' => EstadoObjetivo::COMPLETADO
        ]);

        $objetivo4 = ObjetivoAhorro::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario4->id,
            'nombre' => 'PlayStation 5',
            'cantidad_objetivo' => 800.00,
            'cantidad_actual' => 300.00,
            'fecha_inicio' => Carbon::now()->subMonth(),
            'fecha_limite' => Carbon::now()->addMonths(3),
            'estado' => EstadoObjetivo::EN_PROGRESO
        ]);

        $objetivo5 = ObjetivoAhorro::create([
            'id' => Str::uuid(),
            'usuario_id' => $usuario5->id,
            'nombre' => 'Master universitario',
            'cantidad_objetivo' => 2500.00,
            'cantidad_actual' => 800.00,
            'fecha_inicio' => Carbon::now()->subMonths(2),
            'fecha_limite' => Carbon::now()->addMonths(10),
            'estado' => EstadoObjetivo::PAUSADO
        ]);

        // ============================================
        // 16. CREAR APORTES A AHORRO
        // ============================================
        // Aportes para Viaje a Japón
        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo1->id,
            'fecha' => Carbon::now()->subMonths(3),
            'importe' => 500.00,
            'nota' => 'Aporte inicial'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo1->id,
            'fecha' => Carbon::now()->subMonths(2),
            'importe' => 300.00,
            'nota' => 'Ahorro mensual'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo1->id,
            'fecha' => Carbon::now()->subMonth(),
            'importe' => 250.00,
            'nota' => 'Extra'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo1->id,
            'fecha' => Carbon::now(),
            'importe' => 150.00,
            'nota' => 'Ahorro febrero'
        ]);

        // Aportes para Coche nuevo
        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonths(6),
            'importe' => 1000.00,
            'nota' => 'Ahorro inicial'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonths(5),
            'importe' => 500.00,
            'nota' => 'Ahorro mensual'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonths(4),
            'importe' => 500.00,
            'nota' => 'Ahorro mensual'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonths(3),
            'importe' => 500.00,
            'nota' => 'Ahorro mensual'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonths(2),
            'importe' => 500.00,
            'nota' => 'Ahorro mensual'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo2->id,
            'fecha' => Carbon::now()->subMonth(),
            'importe' => 500.00,
            'nota' => 'Ahorro mensual'
        ]);

        // Aportes para PS5
        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo4->id,
            'fecha' => Carbon::now()->subMonth(),
            'importe' => 150.00,
            'nota' => 'Cumpleaños'
        ]);

        AporteAhorro::create([
            'id' => Str::uuid(),
            'objetivo_ahorro_id' => $objetivo4->id,
            'fecha' => Carbon::now(),
            'importe' => 150.00,
            'nota' => 'Ahorro'
        ]);

        // ============================================
        // 17. CREAR TRANSFERENCIAS DE PASAPORTE
        // ============================================
        TransferenciaPasaporte::create([
            'id' => Str::uuid(),
            'pasaporte_id' => PasaporteDigital::where('codigo', 'PAS-2025-003')->first()->id,
            'vendedor_id' => $usuario1->id,
            'comprador_id' => $usuario3->id,
            'fecha' => Carbon::now()->subDays(10),
            'estado' => EstadoTransferencia::COMPLETADA,
            'token_verificacion' => Str::random(32)
        ]);

        TransferenciaPasaporte::create([
            'id' => Str::uuid(),
            'pasaporte_id' => PasaporteDigital::where('codigo', 'PAS-2025-006')->first()->id,
            'vendedor_id' => $usuario3->id,
            'comprador_id' => $usuario4->id,
            'fecha' => Carbon::now()->subDays(5),
            'estado' => EstadoTransferencia::INICIADA,
            'token_verificacion' => Str::random(32)
        ]);

        TransferenciaPasaporte::create([
            'id' => Str::uuid(),
            'pasaporte_id' => PasaporteDigital::where('codigo', 'PAS-2025-009')->first()->id,
            'vendedor_id' => $usuario4->id,
            'comprador_id' => $usuario5->id,
            'fecha' => Carbon::now()->subDays(2),
            'estado' => EstadoTransferencia::RECHAZADA,
            'token_verificacion' => Str::random(32)
        ]);
    }
}