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
        Schema::create('tr_jawaban_internal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_indikator');
            $table->integer('level_terpilih_internal');
            $table->string('uraian_kriteria1');
            $table->string('uraian_kriteria2');
            $table->string('uraian_kriteria3');
            $table->string('uraian_kriteria4');
            $table->string('uraian_kriteria5');
            $table->integer('level_terpilih_eksternal');
            $table->string('uraian_ekternal');
            $table->unsignedBigInteger('id_user_internal');
            $table->unsignedBigInteger('id_user_ekternal');
            $table->timestamps();

            $table->foreign('id_periode')->references('id')->on('periode');
            $table->foreign('id_indikator')->references('id')->on('indikator');
            $table->foreign('id_user_internal')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_jawaban_internal');
    }
};
