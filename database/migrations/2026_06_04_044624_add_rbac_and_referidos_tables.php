<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Vincular usuario ↔ persona (para flujo personero)
        Schema::table('usuario', function (Blueprint $table) {
            $table->unsignedInteger('id_persona')->nullable()->after('id_zona');
            $table->foreign('id_persona')
                ->references('id_persona')->on('persona')->nullOnDelete();
        });

        // 2. Links de invitación generados por coordinadores
        Schema::create('link_invitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_coordinador');
            $table->string('token', 64)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('veces_usado')->default(0);
            $table->datetime('created_at')->useCurrent();

            $table->foreign('id_coordinador')
                ->references('id_usuario')->on('usuario')->cascadeOnDelete();
        });

        // 3. Trazabilidad del referido en interesado
        Schema::table('interesado', function (Blueprint $table) {
            $table->unsignedInteger('id_link_invitacion')->nullable()->after('id_comite');
            $table->foreign('id_link_invitacion')
                ->references('id')->on('link_invitacion')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('interesado', function (Blueprint $table) {
            $table->dropForeign(['id_link_invitacion']);
            $table->dropColumn('id_link_invitacion');
        });

        Schema::dropIfExists('link_invitacion');

        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign(['id_persona']);
            $table->dropColumn('id_persona');
        });
    }
};
