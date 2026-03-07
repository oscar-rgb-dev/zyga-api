<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_subscription_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); // FK hacia la tabla users
            $table->unsignedBigInteger('subscription_plan_id'); // FK hacia la tabla subscription_plans
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_subscription_plans');
    }
};
