<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->uuid('permohonan_id');
            $table->string('surat_permohonan_hibah');
            $table->string('rencana_anggaran');
            $table->string('fc_norek');
            $table->enum('status', array('dalam antrian', 'diproses', 'diterima', 'ditolak'))->default('dalam antrian');
            $table->string('tgl_acc')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hibahs');
    }
};
