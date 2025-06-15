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
        Schema::create('mnt_cita_medica', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paciente')->unsigned();
            $table->foreign('paciente')->references('id')->on('mnt_paciente');
            $table->bigInteger('doctor')->unsigned();
            $table->foreign('doctor')->references('id')->on('mnt_doctor');
            $table->date('fecha');
            $table->string('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_cita_medica');
    }
};
