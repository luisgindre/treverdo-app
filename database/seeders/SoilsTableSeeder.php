<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soils')->truncate();

         $soils = [
             
            ['name' => 'Arcillo Arenoso'],
            ['name' => 'Arcillo Limoso'],
            ['name' => 'Arcillo'],
            ['name' => 'Arenoso'],
            ['name' => 'Arenoso Franco'],
            ['name' => 'Franco'],
            ['name' => 'Franco Arcillo Arenoso'],
            ['name' => 'Franco Arcillo Limoso'],
            ['name' => 'Franco Limoso'],

            ];
           
        DB::table('soils')->insert($soils);
    }
}
