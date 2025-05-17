<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunisipiuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::table('munisipiu')->insert([
            ['naran_munisipiu' => 'Dili'],
            ['naran_munisipiu' => 'Baucau'],
            ['naran_munisipiu' => 'Bobonaro'],
            ['naran_munisipiu' => 'Covalima'],
            ['naran_munisipiu' => 'Ermera'],
            ['naran_munisipiu' => 'Liquica'],
            ['naran_munisipiu' => 'Manatuto'],
            ['naran_munisipiu' => 'Manufahi'],
            ['naran_munisipiu' => 'Oecusse'],
            ['naran_munisipiu' => 'Ainaro'],
        ]);
     
    }
}
