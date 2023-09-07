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
        Schema::table('domain', function(Blueprint $table){
            $table->float('bobot_nilai')->nullable()->after('nama_domain');
        });

        Schema::table('aspek', function(Blueprint $table){
            $table->float('bobot_nilai')->nullable()->after('nama_aspek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domain', function(Blueprint $table){
            $table->float('bobot_nilai');
            });
        Schema::table('aspek', function(Blueprint $table){
            $table->float('bobot_nilai');
            });
    }
};
