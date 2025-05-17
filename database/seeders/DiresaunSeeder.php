<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiresaunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diresaun')->insert([
            ['naran_diresaun' => 'Diresaun Rekursu Umanu'],
            ['naran_diresaun' => 'Diresasun Administrasun Kontabilidade'],
            ['naran_diresaun' => 'Diresaun Kontrolu Kualidade'],
            ['naran_diresaun' => 'Diresaun Saneamentu'],  
        ]);
    }
}
