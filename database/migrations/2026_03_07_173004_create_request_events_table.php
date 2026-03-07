<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('request_events', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('request_id');  // FK hacia assistance_requests.id
            $table->string('event_type');  // Tipo de evento (ej. created, assigned, completed)
            $table->text('event_data')->nullable();  // Datos adicionales sobre el evento
            $table->timestamps();

            // Clave foránea
            $table->foreign('request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_events');
    }
};
