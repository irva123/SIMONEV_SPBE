<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periode')->insert([
            'tahun' => 2023,
            'status' => '1',
            'mulai' => '2023-07-11 23:59:00',
            'selesai' => '2023-12-11 23:59:00',
            'id_users' => 1,
        ]);
    }
}
