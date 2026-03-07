<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('status_domains', function (Blueprint $table) {
            $table->smallIncrements('id');  // SMALLINT UNSIGNED AUTO_INCREMENT
            $table->string('code', 50)->unique();  // Ejemplo: user, provider, assistance_request
            $table->string('name', 100);  // Nombre descriptivo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_domains');
    }
};
