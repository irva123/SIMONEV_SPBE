<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('progress')->insert([
            'nama_progress' => 'Penilaian Mandiri',
            'id_periode' => 1,
            'mulai' => '2023-07-11 23:59:00',
            'selesai' => '2023-08-11 23:59:00',
            'id_users' => 1,
        ]);
    }
}
