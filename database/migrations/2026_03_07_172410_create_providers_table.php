<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED
            $table->unsignedBigInteger('user_id');  // FK hacia users.id
            $table->string('display_name');
            $table->string('provider_kind', 100)->nullable();
            $table->unsignedInteger('status_id');  // FK hacia status_types (dominio provider)
            $table->boolean('is_verified')->default(false);
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status_types')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
