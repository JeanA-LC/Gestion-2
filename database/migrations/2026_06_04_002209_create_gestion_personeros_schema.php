<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ==========================================
        // TERRITORIAL
        // ==========================================

        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id_departamento');
            $table->string('nombre', 100)->unique();
        });

        Schema::create('provincia', function (Blueprint $table) {
            $table->increments('id_provincia');
            $table->unsignedInteger('id_departamento');
            $table->string('nombre', 100);

            $table->foreign('id_departamento')
                ->references('id_departamento')
                ->on('departamento');
        });

        Schema::create('distrito', function (Blueprint $table) {
            $table->increments('id_distrito');
            $table->unsignedInteger('id_provincia');
            $table->string('nombre', 100);
            $table->string('ubigeo', 6)->unique();

            $table->foreign('id_provincia')
                ->references('id_provincia')
                ->on('provincia');
        });

        Schema::create('zona', function (Blueprint $table) {
            $table->increments('id_zona');
            $table->unsignedInteger('id_distrito');
            $table->string('nombre', 150);
            $table->enum('tipo', [
                'CENTRO_POBLADO',
                'CASERIO',
                'BARRIO',
                'URBANIZACION',
                'SECTOR'
            ])->nullable();
            $table->string('descripcion', 255)->nullable();

            $table->foreign('id_distrito')
                ->references('id_distrito')
                ->on('distrito');
        });

        // ==========================================
        // SEGURIDAD
        // ==========================================

        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id_rol');
            $table->string('nombre', 50)->unique();
            $table->string('descripcion', 255)->nullable();
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('correo', 150)->unique();
            $table->string('password', 255);
            $table->string('telefono', 20)->nullable();
            $table->unsignedInteger('id_zona')->nullable();
            $table->boolean('estado')->default(true);
            $table->dateTime('fecha_registro')->useCurrent();

            $table->foreign('id_zona')
                ->references('id_zona')
                ->on('zona');
        });

        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_rol');

            $table->primary(['id_usuario', 'id_rol']);

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario');

            $table->foreign('id_rol')
                ->references('id_rol')
                ->on('rol');
        });

        // ==========================================
        // POLITICA
        // ==========================================

        Schema::create('tipo_actor_politico', function (Blueprint $table) {
            $table->increments('id_tipo_actor');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
        });

        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('dni', 8)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->dateTime('fecha_registro')->useCurrent();
        });

        Schema::create('historial_actor_politico', function (Blueprint $table) {
            $table->increments('id_historial');
            $table->unsignedInteger('id_persona');
            $table->unsignedInteger('id_tipo_actor');
            $table->dateTime('fecha')->useCurrent();
            $table->text('observacion')->nullable();

            $table->foreign('id_persona')
                ->references('id_persona')
                ->on('persona');

            $table->foreign('id_tipo_actor')
                ->references('id_tipo_actor')
                ->on('tipo_actor_politico');
        });

        Schema::create('comite_base', function (Blueprint $table) {
            $table->increments('id_comite');
            $table->unsignedInteger('id_zona')->nullable();
            $table->string('nombre', 150);
            $table->string('responsable', 150)->nullable();
            $table->text('observacion')->nullable();

            $table->foreign('id_zona')
                ->references('id_zona')
                ->on('zona');
        });

        // ==========================================
        // INTERESADOS
        // ==========================================

        Schema::create('interesado', function (Blueprint $table) {
            $table->increments('id_interesado');
            $table->unsignedInteger('id_persona')->unique();
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_tipo_actor');
            $table->unsignedInteger('id_comite')->nullable();
            $table->dateTime('fecha_registro')->useCurrent();

            $table->foreign('id_persona')
                ->references('id_persona')
                ->on('persona');

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario');

            $table->foreign('id_tipo_actor')
                ->references('id_tipo_actor')
                ->on('tipo_actor_politico');

            $table->foreign('id_comite')
                ->references('id_comite')
                ->on('comite_base');
        });

        // ==========================================
        // PARTICIPACION
        // ==========================================

        Schema::create('tipo_evento', function (Blueprint $table) {
            $table->increments('id_tipo_evento');
            $table->string('nombre', 100)->unique();
            $table->string('descripcion', 255)->nullable();
        });

        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id_evento');
            $table->unsignedInteger('id_tipo_evento');
            $table->string('nombre', 200);
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->string('lugar', 255)->nullable();
            $table->integer('capacidad')->nullable();

            $table->foreign('id_tipo_evento')
                ->references('id_tipo_evento')
                ->on('tipo_evento');
        });

        Schema::create('participacion', function (Blueprint $table) {
            $table->increments('id_participacion');
            $table->unsignedInteger('id_interesado');
            $table->unsignedInteger('id_evento');
            $table->string('tipo_contacto', 100)->nullable();
            $table->string('resultado', 255)->nullable();
            $table->integer('nivel_participacion')->nullable();
            $table->enum('grado_incidencia', ['BAJO', 'MEDIO', 'ALTO'])->nullable();
            $table->text('observacion')->nullable();
            $table->dateTime('fecha')->useCurrent();

            $table->foreign('id_interesado')
                ->references('id_interesado')
                ->on('interesado');

            $table->foreign('id_evento')
                ->references('id_evento')
                ->on('evento');
        });

        // ==========================================
        // FORMACION
        // ==========================================

        Schema::create('postulacion_personero', function (Blueprint $table) {
            $table->increments('id_postulacion');
            $table->unsignedInteger('id_interesado')->unique();
            $table->text('experiencia')->nullable();
            $table->string('disponibilidad', 100)->nullable();
            $table->boolean('transporte_propio')->default(false);
            $table->enum('estado', ['PENDIENTE', 'APROBADO', 'RECHAZADO'])->default('PENDIENTE');
            $table->dateTime('fecha_postulacion')->useCurrent();

            $table->foreign('id_interesado')
                ->references('id_interesado')
                ->on('interesado');
        });

        Schema::create('historial_postulacion', function (Blueprint $table) {
            $table->increments('id_historial');
            $table->unsignedInteger('id_postulacion');
            $table->enum('estado', ['PENDIENTE', 'APROBADO', 'RECHAZADO']);
            $table->text('observacion')->nullable();
            $table->dateTime('fecha')->useCurrent();

            $table->foreign('id_postulacion')
                ->references('id_postulacion')
                ->on('postulacion_personero');
        });

        Schema::create('capacitacion', function (Blueprint $table) {
            $table->increments('id_capacitacion');
            $table->string('nombre', 200);
            $table->text('descripcion')->nullable();
            $table->string('url_video', 500)->nullable();
            $table->integer('duracion_minutos')->nullable();
        });

        Schema::create('postulacion_capacitacion', function (Blueprint $table) {
            $table->increments('id_postulacion_capacitacion');
            $table->unsignedInteger('id_postulacion');
            $table->unsignedInteger('id_capacitacion');
            $table->boolean('completado')->default(false);
            $table->dateTime('fecha_completado')->nullable();

            $table->foreign('id_postulacion')
                ->references('id_postulacion')
                ->on('postulacion_personero');

            $table->foreign('id_capacitacion')
                ->references('id_capacitacion')
                ->on('capacitacion');
        });

        Schema::create('evaluacion', function (Blueprint $table) {
            $table->increments('id_evaluacion');
            $table->string('nombre', 200)->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('nota_minima', 5, 2)->nullable();
        });

        Schema::create('intento_evaluacion', function (Blueprint $table) {
            $table->increments('id_intento');
            $table->unsignedInteger('id_postulacion');
            $table->unsignedInteger('id_evaluacion');
            $table->integer('numero_intento')->default(1);
            $table->decimal('nota', 5, 2)->nullable();
            $table->boolean('aprobado')->nullable();
            $table->dateTime('fecha')->useCurrent();

            $table->foreign('id_postulacion')
                ->references('id_postulacion')
                ->on('postulacion_personero');

            $table->foreign('id_evaluacion')
                ->references('id_evaluacion')
                ->on('evaluacion');
        });

        Schema::create('credencial', function (Blueprint $table) {
            $table->increments('id_credencial');
            $table->unsignedInteger('id_postulacion')->unique();
            $table->string('codigo_qr', 255)->nullable();
            $table->dateTime('fecha_emision')->nullable();
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->enum('estado', ['ACTIVA', 'VENCIDA', 'ANULADA'])->default('ACTIVA');

            $table->foreign('id_postulacion')
                ->references('id_postulacion')
                ->on('postulacion_personero');
        });

        // ==========================================
        // ELECTORAL
        // ==========================================

        Schema::create('centro_votacion', function (Blueprint $table) {
            $table->increments('id_centro_votacion');
            $table->unsignedInteger('id_zona');
            $table->string('nombre', 200);
            $table->string('direccion', 255)->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();

            $table->foreign('id_zona')
                ->references('id_zona')
                ->on('zona');
        });

        Schema::create('mesa_sufragio', function (Blueprint $table) {
            $table->increments('id_mesa');
            $table->unsignedInteger('id_centro_votacion');
            $table->string('codigo_mesa', 20)->unique()->nullable();
            $table->integer('electores')->nullable();

            $table->foreign('id_centro_votacion')
                ->references('id_centro_votacion')
                ->on('centro_votacion');
        });

        Schema::create('tipo_personero', function (Blueprint $table) {
            $table->increments('id_tipo_personero');
            $table->string('nombre', 100)->unique();
            $table->enum('nivel_correspondiente', [
                'PROVINCIA',
                'DISTRITO',
                'ZONA',
                'CENTRO_VOTACION',
                'MESA_SUFRAGIO'
            ]);
            $table->text('descripcion')->nullable();
        });

        Schema::create('asignacion_personero', function (Blueprint $table) {
            $table->increments('id_asignacion');

            $table->unsignedInteger('id_postulacion');
            $table->unsignedInteger('id_tipo_personero');

            $table->enum('nivel_asignacion', [
                'PROVINCIA',
                'DISTRITO',
                'ZONA',
                'CENTRO_VOTACION',
                'MESA_SUFRAGIO'
            ]);

            $table->unsignedInteger('id_referencia');

            $table->string('observacion', 255)->nullable();

            $table->dateTime('fecha_asignacion')->useCurrent();

            $table->enum('estado', [
                'ASIGNADO',
                'CONFIRMADO',
                'RECHAZADO',
                'FINALIZADO'
            ])->default('ASIGNADO');

            $table->foreign('id_postulacion')
                ->references('id_postulacion')
                ->on('postulacion_personero');

            $table->foreign('id_tipo_personero')
                ->references('id_tipo_personero')
                ->on('tipo_personero');

            // Nombre corto para evitar el error 1059
            $table->unique(
                [
                    'id_postulacion',
                    'nivel_asignacion',
                    'id_referencia'
                ],
                'uq_asig_personero'
            );
        });

        Schema::create('reporte_estado', function (Blueprint $table) {
            $table->increments('id_reporte_estado');
            $table->unsignedInteger('id_asignacion');
            $table->enum('estado_general', [
                'SIN_NOVEDAD',
                'OBSERVACION',
                'INCIDENCIA',
                'CRITICO'
            ])->nullable();
            $table->text('observacion')->nullable();
            $table->dateTime('fecha_reporte')->useCurrent();

            $table->foreign('id_asignacion')
                ->references('id_asignacion')
                ->on('asignacion_personero');
        });

        Schema::create('reporte_final', function (Blueprint $table) {
            $table->increments('id_reporte_final');
            $table->unsignedInteger('id_asignacion');
            $table->text('resumen')->nullable();
            $table->text('incidencias')->nullable();
            $table->string('archivo_acta', 255)->nullable();
            $table->dateTime('fecha_reporte')->useCurrent();

            $table->foreign('id_asignacion')
                ->references('id_asignacion')
                ->on('asignacion_personero');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('reporte_final');
        Schema::dropIfExists('reporte_estado');
        Schema::dropIfExists('asignacion_personero');
        Schema::dropIfExists('tipo_personero');
        Schema::dropIfExists('mesa_sufragio');
        Schema::dropIfExists('centro_votacion');
        Schema::dropIfExists('credencial');
        Schema::dropIfExists('intento_evaluacion');
        Schema::dropIfExists('evaluacion');
        Schema::dropIfExists('postulacion_capacitacion');
        Schema::dropIfExists('capacitacion');
        Schema::dropIfExists('historial_postulacion');
        Schema::dropIfExists('postulacion_personero');
        Schema::dropIfExists('participacion');
        Schema::dropIfExists('evento');
        Schema::dropIfExists('tipo_evento');
        Schema::dropIfExists('interesado');
        Schema::dropIfExists('comite_base');
        Schema::dropIfExists('historial_actor_politico');
        Schema::dropIfExists('persona');
        Schema::dropIfExists('tipo_actor_politico');
        Schema::dropIfExists('usuario_rol');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('rol');
        Schema::dropIfExists('zona');
        Schema::dropIfExists('distrito');
        Schema::dropIfExists('provincia');
        Schema::dropIfExists('departamento');

        Schema::enableForeignKeyConstraints();
    }
};