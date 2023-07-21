<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aspek')->insert([
            'nama_aspek' => 'Aspek 1 Kebijakan Tata Kelola SPBE',
            'id_periode' => 1,
            'id_domain' => 1,
            'id_users' => 2,
        ]);
    }
}
