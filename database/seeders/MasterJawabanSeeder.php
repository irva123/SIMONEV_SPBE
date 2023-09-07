<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_jawaban')->insert([
            'id_indikator' => 1,
            'level' => 1,
            'jawaban' => 'Konsep kebijakan internal terkait Arsitektur SPBE Instansi Pusat/Pemerintah Daerah belum atau telah tersedia.',
        ]);

        DB::table('m_jawaban')->insert([
            'id_indikator' => 1,
            'level' => 2,
            'jawaban' => 'Kebijakan Internal Arsitektur SPBE Instansi Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah ditetapkan. Kondisi: Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah tersebut belum memuat secara lengkap pengaturan mengenai referensi Arsitektur dan domain Arsitektur SPBE (Proses Bisnis, Data dan Informasi, Infrastruktur SPBE, Aplikasi SPBE, Keamanan SPBE, dan Layanan SPBE).'
        ]);

        DB::table('m_jawaban')->insert([
            'id_indikator' => 1,
            'level' => 3,
            'jawaban' => 'Kriteria tingkat 2 telah terpenuhi dan kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah memuat secara lengkap pengaturan mengenai referensi Arsitektur dan domain Arsitektur SPBE (Proses Bisnis, Data dan Informasi, Infrastruktur SPBE, Aplikasi SPBE, Keamanan SPBE, dan Layanan SPBE).'
        ]);

        DB::table('m_jawaban')->insert([
            'id_indikator' => 1,
            'level' => 4,
            'jawaban' => 'Kriteria tingkat 3 telah terpenuhi, kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah mengatur integrasi SPBE antar Instansi Pusat, antar Pemerintah Daerah, dan/atau antar Instansi Pusat dan Pemerintah Daerah, dan kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah direviu dan dievaluasi secara periodik'
        ]);

        DB::table('m_jawaban')->insert([
            'id_indikator' => 1,
            'level' => 5,
            'jawaban' => 'Kriteria tingkat 4 telah terpenuhi serta hasil reviu dan evaluasi kebijakan internal terkait Tim Koordinasi SPBE Instansi Pusat/Pemerintah Daerah telah ditindaklanjuti dengan kebijakan baru.'
        ]);
    }
}
