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
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->unique();;
            $table->string('password');
            $table->string('company_email');
            $table->string('registrant_name');
            $table->string('subscriber_email');
            $table->string('phone_number');
            $table->string('registered_phone_number');
            $table->string('address');
            $table->string('website');
            $table->string('avatar');
            $table->boolean('is_active');
            $table->boolean('is_open');
            $table->string('company_name');
            $table->boolean('is_master');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
