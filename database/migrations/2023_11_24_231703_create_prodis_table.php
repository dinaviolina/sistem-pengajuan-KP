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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id("kodeProdi");
            $table->string("password");
            $table->string("namaProdi");
            $table->string("NIPkaprodi");
            $table->string("namaKaprodi");
            $table->foreignId('kodeFakultas')->references('kodeFakultas')->on('fakultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
