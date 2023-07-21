<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domain')->insert([
            'nama_domain' => 'Domain 1 Kebijakan SPBE',
            'id_periode' => 1,
            'id_users' => 2,
        ]);
    }
}
