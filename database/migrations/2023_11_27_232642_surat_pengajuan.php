<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surat_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->string('instansi_tujuan');
            $table->date('mulai');
            $table->date('sampai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //
    }
};
