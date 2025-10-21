<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   // ...
public function up(): void
{
    Schema::table('schools', function (Blueprint $table) {
        $table->string('kecamatan')->nullable()->after('kabupaten');
        $table->string('kelurahan')->nullable()->after('kecamatan');
        $table->string('nama_jalan')->nullable()->after('kelurahan'); // Untuk Nama Jalan
    });
}

public function down(): void
{
    Schema::table('schools', function (Blueprint $table) {
        $table->dropColumn([ 'kecamatan', 'kelurahan', 'nama_jalan']);
    });
}

};
