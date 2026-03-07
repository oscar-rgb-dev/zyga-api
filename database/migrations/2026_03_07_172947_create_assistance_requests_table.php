<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assistance_requests', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('public_id', 26)->unique();  // Identificador público para la API
            $table->unsignedBigInteger('user_id');  // FK hacia users.id
            $table->unsignedBigInteger('provider_id')->nullable();  // FK hacia providers.id
            $table->unsignedBigInteger('service_id');  // FK hacia services.id (cambio aquí)
            $table->unsignedBigInteger('vehicle_id')->nullable();  // FK hacia vehicles.id
            $table->decimal('lat', 10, 8);  // Latitud
            $table->decimal('lng', 11, 8);  // Longitud
            $table->string('pickup_address')->nullable();  // Dirección de recogida
            $table->enum('status', ['created', 'assigned', 'in_progress', 'completed', 'cancelled'])->default('created');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('set null');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assistance_requests');
    }
};
