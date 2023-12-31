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
            $table->string('lampiran1');
            $table->string('lampiran2');
            $table->string('lampiran3');
            $table->string('jumlah_hibah');
            $table->enum('status', array('dalam antrian', 'diproses', 'diterima', 'ditolak'))->default('dalam antrian');
            $table->string('tgl_acc')->nullable();
            $table->timestamps();
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
