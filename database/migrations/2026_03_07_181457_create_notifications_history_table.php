<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications_history', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('notification_id');  // FK hacia notifications.id
            $table->string('status');  // Estado de la notificación (sent, read, etc.)
            $table->timestamp('read_at')->nullable();  // Fecha de lectura
            $table->timestamps();

            // Clave foránea
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications_history');
    }
};
