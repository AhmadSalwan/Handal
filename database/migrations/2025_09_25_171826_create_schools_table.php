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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('kabupaten');
            $table->string('email')->unique();
            $table->string('npsn')->unique();
            $table->boolean('is_verified')->default(false); // untuk verifikasi admin
            $table->integer('skor')->nullable(); // untuk verifikasi admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
