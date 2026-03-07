<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_history', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('service_request_id');  // FK hacia service_requests.id
            $table->string('status');  // Estado del servicio (ej. in_progress, completed)
            $table->timestamps();

            // Clave foránea
            $table->foreign('service_request_id')->references('id')->on('service_requests')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_history');
    }
};
