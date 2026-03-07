<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id');  // FK hacia users.id
            $table->unsignedSmallInteger('vehicle_type_id');  // FK hacia vehicle_types.id
            $table->string('plate', 16)->unique();  // Placa del vehículo
            $table->string('brand', 60);
            $table->string('model', 60);
            $table->unsignedSmallInteger('year')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
