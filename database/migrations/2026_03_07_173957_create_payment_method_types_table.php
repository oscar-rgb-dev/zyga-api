<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_method_types', function (Blueprint $table) {
            $table->smallIncrements('id');  // SMALLINT UNSIGNED AUTO_INCREMENT
            $table->string('code', 50)->unique();  // Ejemplo: card, cash, transfer
            $table->string('name', 100);  // Nombre del método de pago
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_method_types');
    }
};
