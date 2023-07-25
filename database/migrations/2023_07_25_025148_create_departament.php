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
        Schema::create('departament', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->string('departamento'); // Campo 'departamento' de tipo string
            $table->string('estado'); // Campo 'estado' de tipo string
            $table->timestamps(); // Campos de fecha de creación y actualización (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departament');
    }
};
