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
        Schema::table('users', function(Blueprint $table){
            $table->unsignedBigInteger('id_role')->nullable()->after('no_hp');
            $table->unsignedBigInteger('id_opd')->nullable()->after('id_role');

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
        Schema::table('users', function(Blueprint $table){
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_opd');
            });
    }
};
