<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('request_history', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('request_id');  // FK hacia assistance_requests.id
            $table->string('status');  // Estado de la solicitud (ej. created, assigned)
            $table->timestamps();

            // Clave foránea
            $table->foreign('request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_history');
    }
};
