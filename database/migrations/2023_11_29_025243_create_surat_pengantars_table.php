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
        Schema::create('surat_pengantars', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_sutar");
            $table->string('judul_penelitian')->nullable();
            $table->string('jangka_waktu_penelitian')->nullable();
            $table->string('identitas_suratBalasan')->nullable();
            $table->foreignId('kodeKP')->references('id')->on('kerja_prakteks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pengantars');
    }
};
