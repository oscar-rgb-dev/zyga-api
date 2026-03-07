<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_images', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('service_id');  // FK hacia services.id
            $table->string('image_url');  // URL de la imagen
            $table->timestamps();

            // Clave foránea
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_images');
    }
};
