<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grau')->insert([
            ['naran_grau' => 'Grau A1', 'salariu' => 1500],
            ['naran_grau' => 'Grau A2', 'salariu' => 1000],
            ['naran_grau' => 'Grau B1', 'salariu' => 800],
            ['naran_grau' => 'Grau B2', 'salariu' => 750],
            ['naran_grau' => 'Grau C1', 'salariu' => 350],
            ['naran_grau' => 'Grau D2', 'salariu' => 200],
            ['naran_grau' => 'Grau E1', 'salariu' => 180],
        ]);
    }
}
