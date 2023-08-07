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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('nip');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_opd');
            $table->timestamps();

            $table->foreign('id_role')->references('id')->on('role');
            $table->foreign('id_opd')->references('id')->on('opd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};