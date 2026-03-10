<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaneacionEstrategicaSeeder extends Seeder
{
    public function run(): void
    {
        $responsables = [
            [
                'codigo' => 'RESP-001',
                'nombre' => 'Dra. Laura Méndez Castillo',
                'cargo' => 'Rectora',
                'correo_institucional' => 'rectoria@universidad.edu.mx',
                'telefono_extension' => '1001',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'RESP-002',
                'nombre' => 'Mtro. Carlos Villalobos',
                'cargo' => 'Director de Planeación Institucional',
                'correo_institucional' => 'planeacion@universidad.edu.mx',
                'telefono_extension' => '1015',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'RESP-003',
                'nombre' => 'Dra. María Fernanda Salas',
                'cargo' => 'Directora Académica',
                'correo_institucional' => 'academica@universidad.edu.mx',
                'telefono_extension' => '1102',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('responsables')->insert($responsables);

        $responsableIds = DB::table('responsables')->pluck('id', 'codigo');

        $unidades = [
            [
                'responsable_id' => $responsableIds['RESP-002'],
                'codigo' => 'UNI-PLAN',
                'nombre' => 'Dirección de Planeación Institucional',
                'tipo' => 'direccion',
                'descripcion' => 'Coordina el seguimiento del plan estratégico universitario.',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'responsable_id' => $responsableIds['RESP-003'],
                'codigo' => 'UNI-ACA',
                'nombre' => 'Vicerrectoría Académica',
                'tipo' => 'direccion',
                'descripcion' => 'Conduce los procesos de mejora de calidad educativa.',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('unidades')->insert($unidades);

        $unidadIds = DB::table('unidades')->pluck('id', 'codigo');

        DB::table('planes_estrategicos')->insert([
            'responsable_id' => $responsableIds['RESP-001'],
            'codigo' => 'PEI-2025-2030',
            'nombre' => 'Plan Estratégico Institucional 2025-2030',
            'descripcion' => 'Ruta institucional para fortalecer docencia, investigación, vinculación y gestión.',
            'mision' => 'Formar profesionales con excelencia académica y compromiso social.',
            'vision' => 'Ser referente nacional en innovación educativa y desarrollo científico.',
            'periodo_inicio' => 2025,
            'periodo_fin' => 2030,
            'estado' => 'en_ejecucion',
            'fecha_aprobacion' => '2025-01-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $planId = DB::table('planes_estrategicos')->where('codigo', 'PEI-2025-2030')->value('id');

        DB::table('perspectivas')->insert([
            [
                'plan_estrategico_id' => $planId,
                'nombre' => 'Formación Integral del Estudiante',
                'descripcion' => 'Enfoque en permanencia, aprendizaje y empleabilidad del estudiantado.',
                'orden' => 1,
                'estado' => 'activa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_estrategico_id' => $planId,
                'nombre' => 'Excelencia Académica y de Investigación',
                'descripcion' => 'Fortalece acreditaciones, productividad científica y posgrados.',
                'orden' => 2,
                'estado' => 'activa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('ejes_estrategicos')->insert([
            [
                'plan_estrategico_id' => $planId,
                'unidad_id' => $unidadIds['UNI-ACA'],
                'codigo' => 'EJE-01',
                'nombre' => 'Innovación Curricular',
                'descripcion' => 'Actualización de planes de estudio orientados a competencias.',
                'orden' => 1,
                'estado' => 'vigente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_estrategico_id' => $planId,
                'unidad_id' => $unidadIds['UNI-PLAN'],
                'codigo' => 'EJE-02',
                'nombre' => 'Gestión Basada en Evidencia',
                'descripcion' => 'Consolidación de indicadores institucionales para la toma de decisiones.',
                'orden' => 2,
                'estado' => 'vigente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $perspectivaId = DB::table('perspectivas')->where('nombre', 'Formación Integral del Estudiante')->value('id');
        $ejeId = DB::table('ejes_estrategicos')->where('codigo', 'EJE-01')->value('id');

        DB::table('objetivos_estrategicos')->insert([
            'perspectiva_id' => $perspectivaId,
            'eje_estrategico_id' => $ejeId,
            'unidad_id' => $unidadIds['UNI-ACA'],
            'responsable_id' => $responsableIds['RESP-003'],
            'codigo' => 'OBJ-ACA-01',
            'nombre' => 'Incrementar la tasa de retención estudiantil de primer año',
            'descripcion' => 'Reducir deserción mediante tutorías, nivelación académica y acompañamiento psicosocial.',
            'tipo' => 'estrategico',
            'estado' => 'en_ejecucion',
            'fecha_inicio' => '2025-02-01',
            'fecha_fin' => '2030-12-31',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $objetivoId = DB::table('objetivos_estrategicos')->where('codigo', 'OBJ-ACA-01')->value('id');

        DB::table('indicadores')->insert([
            'objetivo_estrategico_id' => $objetivoId,
            'unidad_id' => $unidadIds['UNI-ACA'],
            'responsable_id' => $responsableIds['RESP-003'],
            'codigo' => 'IND-RET-01',
            'nombre' => 'Tasa de retención de primer año',
            'descripcion' => 'Porcentaje de estudiantes de nuevo ingreso que continúan al segundo año.',
            'formula' => '(Estudiantes reinscritos al 2º año / Estudiantes de nuevo ingreso cohorte) * 100',
            'frecuencia' => 'anual',
            'sentido' => 'ascendente',
            'estado' => 'activo',
            'linea_base' => 78.50,
            'meta_global' => 88.00,
            'fecha_inicio' => '2025-01-01',
            'fecha_fin' => '2030-12-31',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $indicadorId = DB::table('indicadores')->where('codigo', 'IND-RET-01')->value('id');

        DB::table('metas_indicador')->insert([
            [
                'indicador_id' => $indicadorId,
                'anio' => 2025,
                'periodo' => 1,
                'valor_meta' => 80.00,
                'estado' => 'programada',
                'observaciones' => 'Primera meta anual del plan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'indicador_id' => $indicadorId,
                'anio' => 2026,
                'periodo' => 1,
                'valor_meta' => 82.00,
                'estado' => 'programada',
                'observaciones' => 'Meta con incremento gradual.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('mediciones_indicador')->insert([
            [
                'indicador_id' => $indicadorId,
                'registrado_por_responsable_id' => $responsableIds['RESP-002'],
                'fecha_medicion' => '2025-12-20',
                'valor' => 79.10,
                'valor_meta_referencia' => 80.00,
                'estado' => 'validada',
                'fuente_dato' => 'Sistema escolar institucional',
                'comentario' => 'Se observó mejora en programas con tutoría temprana.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'indicador_id' => $indicadorId,
                'registrado_por_responsable_id' => $responsableIds['RESP-002'],
                'fecha_medicion' => '2026-12-20',
                'valor' => 81.60,
                'valor_meta_referencia' => 82.00,
                'estado' => 'capturada',
                'fuente_dato' => 'Sistema escolar institucional',
                'comentario' => 'Pendiente validación de cohorte nocturna.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
