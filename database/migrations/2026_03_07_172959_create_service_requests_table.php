<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('assistance_request_id');  // FK hacia assistance_requests.id
            $table->unsignedBigInteger('service_id');  // FK hacia services.id
            $table->unsignedBigInteger('provider_id')->nullable();  // FK hacia providers.id
            $table->string('status')->default('pending');  // Estado de la solicitud (pending, completed)
            $table->timestamps();

            // Claves foráneas
            $table->foreign('assistance_request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
