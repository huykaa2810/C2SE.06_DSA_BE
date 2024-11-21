<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_name');
            $table->string('password');
            $table->string('registrant_name');
            $table->string('subscriber_email');
            $table->string('phone_number');
            $table->string('address');
            $table->boolean('is_active');
            $table->boolean('is_open');
            $table->boolean('is_member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
