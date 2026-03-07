<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('provider_documents', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('provider_id');  // FK hacia providers.id
            $table->string('document_type');  // Tipo de documento (ej. licencia, ID)
            $table->string('document_url');  // URL del documento o archivo
            $table->timestamps();

            // Clave foránea
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_documents');
    }
};
