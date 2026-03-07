<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('service_request_id');  // FK hacia service_requests.id
            $table->integer('rating');  // Calificación del servicio
            $table->text('comments')->nullable();  // Comentarios adicionales
            $table->timestamps();

            // Clave foránea
            $table->foreign('service_request_id')->references('id')->on('service_requests')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_feedbacks');
    }
};
