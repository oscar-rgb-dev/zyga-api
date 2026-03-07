<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('provider_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('provider_id');  // FK hacia providers.id
            $table->integer('rating');  // Calificación del proveedor
            $table->text('review')->nullable();  // Reseña escrita
            $table->timestamps();

            // Clave foránea
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_reviews');
    }
};
