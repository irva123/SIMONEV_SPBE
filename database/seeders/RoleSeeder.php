<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'nama_role' => 'Admin',
        ]);

        DB::table('role')->insert([
            'nama_role' => 'OPD',
        ]);

        DB::table('role')->insert([
            'nama_role' => 'Evaluator Eksternal',
        ]);
    }
}
