<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mnt_consulta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cita_medica')->unsigned();
            $table->foreign('cita_medica')->references('id')->on('mnt_cita_medica');
            $table->string('detalle', 500);
            $table->string('diagnostico', 500);
            $table->bigInteger('medicamento')->unsigned();
            $table->foreign('medicamento')->references('id')->on('mnt_medicamento_asignado');
            $table->bigInteger(column: 'examen')->unsigned();
            $table->foreign('examen')->references('id')->on('mnt_examen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_consulta');
    }
};
