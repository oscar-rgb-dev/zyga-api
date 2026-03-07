<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicle_documents', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('vehicle_id');  // FK hacia vehicles.id
            $table->string('document_type');  // Tipo de documento (ej. tarjeta de circulación)
            $table->string('document_url');  // URL del documento o archivo
            $table->timestamps();

            // Clave foránea
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_documents');
    }
};
