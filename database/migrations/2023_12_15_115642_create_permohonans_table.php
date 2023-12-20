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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');
            $table->string('no_skt')->nullable();
            $table->string('lampiran1');
            $table->string('lampiran2');
            $table->string('lampiran3');
            $table->string('lampiran4');
            $table->string('lampiran5');
            $table->string('lampiran6');
            $table->string('lampiran7');
            $table->string('lampiran8');
            $table->string('lampiran9');
            $table->string('lampiran10');
            $table->string('lampiran11');
            $table->string('lampiran12');
            $table->string('lampiran13');
            $table->string('lampiran14');
            $table->string('lampiran15');
            $table->string('lampiran16');
            $table->string('lampiran17');
            $table->string('lampiran18')->nullable();
            $table->string('lampiran19')->nullable();
            $table->string('lampiran20')->nullable();
            $table->string('lampiran21')->nullable();
            $table->enum('status', array('dalam antrian', 'diproses', 'diterima', 'ditolak'))->default('dalam antrian');
            $table->string('skt')->nullable();
            $table->string('pesan')->nullable();
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
        Schema::dropIfExists('permohonans');
    }
};
