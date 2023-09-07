<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indikator')->insert([
            'nama_indikator' => 'Indikator 1 Tingkat Kematangan Kebijakan Internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah',
            'bobot_nilai' => 8,
            'id_periode' => 1,
            'id_domain' => 1,
            'id_aspek' => 1,
            'id_users' => 2,
            'id_opd' => 1,
        ]);
    }
}
