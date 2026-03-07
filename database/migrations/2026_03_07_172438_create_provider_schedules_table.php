<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('provider_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('provider_id');  // FK hacia providers.id
            $table->tinyInteger('day_of_week')->unsigned();  // Día de la semana (1-7)
            $table->time('start_time');  // Hora de inicio
            $table->time('end_time');  // Hora de fin
            $table->string('timezone', 50)->default('America/Mexico_City');  // Zona horaria
            $table->boolean('is_active')->default(true);  // Estado de la programación
            $table->timestamps();

            // Clave foránea
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->unique(['provider_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_schedules');
    }
};
