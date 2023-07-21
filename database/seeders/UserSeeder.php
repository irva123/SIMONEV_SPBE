<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Admin1',
            'password' => Hash::make('A1SPBE'),
            'nama_lengkap' => 'Irva Putri Finisha',
            'nip' => '2141764103',
            'email' => 'irva@gmail.com',
            'no_hp' => '085123098778',
            'role' => 'Admin',
        ]);

        DB::table('users')->insert([
            'username' => 'OPD1',
            'password' => Hash::make('O1SPBE'),
            'nama_lengkap' => 'Diska Oktavia',
            'nip' => '2141764054',
            'email' => 'Diska@gmail.com',
            'no_hp' => '085123098779',
            'role' => 'OPD',
        ]);

        DB::table('users')->insert([
            'username' => 'Eksternal1',
            'password' => Hash::make('E1SPBE'),
            'nama_lengkap' => 'Aryandari Hanugraeni',
            'nip' => '2141764016',
            'email' => 'Aaryandari@gmail.com',
            'no_hp' => '085123098770',
            'role' => 'Eksternal',
        ]);
    }
}
