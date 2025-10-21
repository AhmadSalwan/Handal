<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->decimal('score_sdm', 5, 2)->nullable()->change();
            $table->decimal('score_infrastruktur', 5, 2)->nullable()->change();
            $table->decimal('score_literasi', 5, 2)->nullable()->change();
            $table->decimal('score_keamanan', 5, 2)->nullable()->change();
            $table->decimal('skor', 5, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->integer('score_sdm')->nullable()->change();
            $table->integer('score_infrastruktur')->nullable()->change();
            $table->integer('score_literasi')->nullable()->change();
            $table->integer('score_keamanan')->nullable()->change();
            $table->integer('skor')->nullable()->change();
        });
    }
};
