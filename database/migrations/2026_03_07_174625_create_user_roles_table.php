<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id');  // FK hacia users.id
            $table->unsignedSmallInteger('role_id');  // FK hacia role_types.id
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role_types')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
