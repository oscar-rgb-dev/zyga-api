<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();  // Correo electrónico del usuario
            $table->string('token');  // Token de reseteo de la contraseña
            $table->timestamp('created_at')->nullable();  // Fecha de creación del token
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_resets');
    }
};
