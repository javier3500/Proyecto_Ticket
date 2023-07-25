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
        Schema::create('ticket', function (Blueprint $table) {
            $table->string('folio')->primary();
            $table->string('departamentosReportan');
            $table->string('departamentosAtencion');
            $table->string('prioridad');
            $table->string('descripcion');
            $table->binary('evidencia')->nullable();
            $table->string('usuarioAtencion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
