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
        Schema::create('school_digital_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            
            $table->string('q1_nama_sekolah')->nullable();
            $table->string('q2_jenjang')->nullable();
            $table->boolean('q3_komunitas_digital')->nullable();
            $table->string('q4_nama_komunitas')->nullable();
            $table->string('q5_jumlah_komunitas')->nullable();
            $table->string('q6_topik_komunitas')->nullable();
            $table->string('q7_dampak_komunitas')->nullable();
            $table->string('q8_keterampilan_komunitas')->nullable();
            $table->string('q9_inklusifitas_komunitas')->nullable();
            $table->string('q10_antusias_komunitas')->nullable();
            $table->timestamps();
            $table->unique('school_id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_digital_activities');
    }
};
