<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('payment_id');  // FK hacia payments.id
            $table->string('gateway');  // Gateway de pago (ej. Stripe, PayPal)
            $table->string('gateway_event_id')->unique();  // ID único del evento de pago en el gateway
            $table->timestamps();

            // Clave foránea
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
