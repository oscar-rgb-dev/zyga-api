<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('assistance_request_id');  // FK hacia assistance_requests.id
            $table->decimal('amount', 10, 2);  // Monto del pago
            $table->string('payment_method');  // Ejemplo: cash, card, etc.
            $table->string('transaction_id')->unique();  // Identificador de la transacción
            $table->string('status')->default('pending');  // Estado del pago (pending, completed, failed)
            $table->timestamps();

            // Clave foránea
            $table->foreign('assistance_request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
