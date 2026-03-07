<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('status_types', function (Blueprint $table) {
            $table->increments('id');  // INT UNSIGNED AUTO_INCREMENT
            $table->unsignedSmallInteger('domain_id');  // FK hacia status_domains.id
            $table->string('code', 50);  // Ejemplo: active, blocked, created
            $table->string('name', 100);
            $table->string('description', 255)->nullable();
            $table->boolean('is_terminal')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Clave foránea y restricciones
            $table->foreign('domain_id')->references('id')->on('status_domains')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->unique(['domain_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_types');
    }
};
