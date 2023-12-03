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
            $table->string('status');
            $table->string('instansi_kp')->nullable();
            $table->foreignId('nim_mhs')->references('id')->on('mahasiswas');
            $table->foreignId('nip_dpa')->references('id')->on('dosen_walis')->nullable();
            $table->foreignId('id_periodeKP')->references('id')->on('periode_kps');
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