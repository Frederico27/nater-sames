<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('regime_espesial')->insert([
         
            ['naran_regime' => 'Regime E', 'grau_regime' => 'Grau E1', 'salariu' => 180],
            ['naran_regime' => 'Regime A', 'grau_regime' => 'Grau A1', 'salariu' => 1500],
            ['naran_regime' => 'Regime A', 'grau_regime' => 'Grau A2', 'salariu' => 1000],
            ['naran_regime' => 'Regime B', 'grau_regime' => 'Grau B1', 'salariu' => 800],
            ['naran_regime' => 'Regime B', 'grau_regime' => 'Grau B2', 'salariu' => 750],
            ['naran_regime' => 'Regime C', 'grau_regime' => 'Grau C1', 'salariu' => 350],
            ['naran_regime' => 'Regime D', 'grau_regime' => 'Grau D2', 'salariu' => 200],
            ['naran_regime' => 'Regime E', 'grau_regime' => 'Grau E1', 'salariu' => 180],

        ]);
    }
}
