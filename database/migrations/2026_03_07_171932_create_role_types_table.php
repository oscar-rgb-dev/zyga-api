<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('role_types', function (Blueprint $table) {
            $table->smallIncrements('id');  // SMALLINT UNSIGNED AUTO_INCREMENT
            $table->string('code', 50)->unique();  // Ejemplo: client, provider, admin
            $table->string('name', 100);
            $table->string('description', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_types');
    }
};
