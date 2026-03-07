<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('legal_documents', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedSmallInteger('consent_type_id');  // FK hacia consent_types.id
            $table->string('version', 50);
            $table->dateTime('published_at', 3);
            $table->char('content_hash', 64);  // SHA-256 hex
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Clave foránea y restricciones
            $table->foreign('consent_type_id')->references('id')->on('consent_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->unique(['consent_type_id', 'version']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_documents');
    }
};
