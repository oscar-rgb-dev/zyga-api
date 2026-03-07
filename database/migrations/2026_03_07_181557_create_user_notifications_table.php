<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id');  // FK hacia users.id
            $table->unsignedBigInteger('notification_id');  // FK hacia notifications.id
            $table->boolean('is_read')->default(false);  // Estado de la notificación (leída o no)
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_notifications');
    }
};
