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
        Schema::create('dosen_walis', function (Blueprint $table) {
            $table->id("nip_dpa");
            $table->string("password");
            $table->string("namaDPA");
            $table->foreignId('kodeProdi')->references('kodeProdi')->on('prodis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_walis');
    }
};
