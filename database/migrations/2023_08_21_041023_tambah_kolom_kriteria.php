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
        Schema::table('indikator', function(Blueprint $table){
            $table->string('penjelasan_indikator')->after('bobot_nilai');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria1')->after('penjelasan_indikator');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria2')->after('kriteria1');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria3')->after('kriteria2');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria4')->after('kriteria3');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria5')->after('kriteria4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indikator', function(Blueprint $table){
            $table->string('penjelasan_indikator');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria1');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria2');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria3');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria4');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->string('kriteria5');
        });
    }
};
