<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');  // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('transaction_id');  // FK hacia transactions.id
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            // Clave foránea
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
