<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('photo_libraries', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('title');
            $table->boolean('is_open');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('photo_libraries');
    }
};
