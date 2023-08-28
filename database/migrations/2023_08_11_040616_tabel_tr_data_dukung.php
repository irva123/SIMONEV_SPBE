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
        Schema::create('tr_data_dukung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jawaban');
            $table->string('nama_file');
            $table->timestamps();

            $table->foreign('id_jawaban')->references('id')->on('tr_jawaban_internal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_data_dukung');
    }
};
