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
        Schema::create('kerja_prakteks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswas');
            $table->foreignId('pembimbing_1')->references('id')->on('dosen_walis')->nullable();
            $table->foreignId('pembimbing_2')->references('id')->on('dosen_walis')->nullable();
            $table->string('instansi_tujuan')->nullable();
            $table->string('judul_penelitian')->nullable();
            $table->string('waktu_penelitian')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('proposal_kp')->nullable();
            $table->string('status_pengajuan_kp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerja_prakteks');
    }
};
