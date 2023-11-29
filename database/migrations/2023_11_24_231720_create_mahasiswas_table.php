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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id("nim_mhs");
            $table->string('password_mhs');
            $table->string('nama_mhs');
            $table->string('jumlahSKS');
            $table->foreignId('nip_dpa')->references('nip_dpa')->on('dosen_walis');
            $table->foreignId('kodeProdi')->references('kodeProdi')->on('prodis');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('angkatan');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
