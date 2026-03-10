<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('nombre');
            $table->string('cargo');
            $table->string('correo_institucional')->unique();
            $table->string('telefono_extension', 10)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsable_id')->nullable()->constrained('responsables')->nullOnDelete();
            $table->string('codigo', 20)->unique();
            $table->string('nombre');
            $table->enum('tipo', ['facultad', 'escuela', 'departamento', 'direccion', 'coordinacion', 'programa', 'otra']);
            $table->text('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('planes_estrategicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsable_id')->nullable()->constrained('responsables')->nullOnDelete();
            $table->string('codigo', 20)->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->unsignedSmallInteger('periodo_inicio');
            $table->unsignedSmallInteger('periodo_fin');
            $table->enum('estado', ['borrador', 'aprobado', 'en_ejecucion', 'finalizado', 'archivado'])->default('borrador');
            $table->date('fecha_aprobacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('perspectivas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_estrategico_id')->constrained('planes_estrategicos')->cascadeOnDelete();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedSmallInteger('orden')->default(1);
            $table->enum('estado', ['activa', 'inactiva'])->default('activa');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ejes_estrategicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_estrategico_id')->constrained('planes_estrategicos')->cascadeOnDelete();
            $table->foreignId('unidad_id')->nullable()->constrained('unidades')->nullOnDelete();
            $table->string('codigo', 20)->nullable();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->unsignedSmallInteger('orden')->default(1);
            $table->enum('estado', ['vigente', 'pausado', 'cerrado'])->default('vigente');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('objetivos_estrategicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perspectiva_id')->constrained('perspectivas')->cascadeOnDelete();
            $table->foreignId('eje_estrategico_id')->nullable()->constrained('ejes_estrategicos')->nullOnDelete();
            $table->foreignId('unidad_id')->nullable()->constrained('unidades')->nullOnDelete();
            $table->foreignId('responsable_id')->nullable()->constrained('responsables')->nullOnDelete();
            $table->string('codigo', 30)->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['estrategico', 'operativo', 'transversal'])->default('estrategico');
            $table->enum('estado', ['pendiente', 'en_ejecucion', 'cumplido', 'detenido'])->default('pendiente');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objetivo_estrategico_id')->constrained('objetivos_estrategicos')->cascadeOnDelete();
            $table->foreignId('unidad_id')->nullable()->constrained('unidades')->nullOnDelete();
            $table->foreignId('responsable_id')->nullable()->constrained('responsables')->nullOnDelete();
            $table->string('codigo', 30)->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('formula')->nullable();
            $table->enum('frecuencia', ['mensual', 'trimestral', 'semestral', 'anual'])->default('trimestral');
            $table->enum('sentido', ['ascendente', 'descendente', 'rango'])->default('ascendente');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->decimal('linea_base', 14, 2)->nullable();
            $table->decimal('meta_global', 14, 2)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('metas_indicador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicador_id')->constrained('indicadores')->cascadeOnDelete();
            $table->unsignedSmallInteger('anio');
            $table->unsignedTinyInteger('periodo')->default(1);
            $table->decimal('valor_meta', 14, 2);
            $table->enum('estado', ['programada', 'ajustada', 'cumplida', 'incumplida'])->default('programada');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['indicador_id', 'anio', 'periodo']);
        });

        Schema::create('mediciones_indicador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicador_id')->constrained('indicadores')->cascadeOnDelete();
            $table->foreignId('registrado_por_responsable_id')->nullable()->constrained('responsables')->nullOnDelete();
            $table->date('fecha_medicion');
            $table->decimal('valor', 14, 2);
            $table->decimal('valor_meta_referencia', 14, 2)->nullable();
            $table->enum('estado', ['capturada', 'validada', 'observada'])->default('capturada');
            $table->string('fuente_dato')->nullable();
            $table->text('comentario')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mediciones_indicador');
        Schema::dropIfExists('metas_indicador');
        Schema::dropIfExists('indicadores');
        Schema::dropIfExists('objetivos_estrategicos');
        Schema::dropIfExists('ejes_estrategicos');
        Schema::dropIfExists('perspectivas');
        Schema::dropIfExists('planes_estrategicos');
        Schema::dropIfExists('unidades');
        Schema::dropIfExists('responsables');
    }
};
