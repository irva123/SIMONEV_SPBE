<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opd')->insert([
            'nama_opd' => 'Diskominfo',
        ]);

        DB::table('opd')->insert([
            'nama_opd' => 'Dispenduk',
        ]);

        DB::table('opd')->insert([
            'nama_opd' => 'Bakesbangpol',
        ]);
    }
}
