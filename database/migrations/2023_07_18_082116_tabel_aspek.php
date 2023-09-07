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
        Schema::create('aspek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aspek');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_domain');
            $table->unsignedBigInteger('id_users');
            $table->timestamps();

            $table->foreign('id_periode')->references('id')->on('periode');
            $table->foreign('id_domain')->references('id')->on('domain');
            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspek');
    }
};
