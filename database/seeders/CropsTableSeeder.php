<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CropsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Eliminar registros existentes en la tabla antes de insertar nuevos datos
         DB::table('crops')->truncate();

         $crops = [
             // Herbáceos
            ['name' => 'Alfalfa régimen', 'crop_group' => 'Herbáceos'],
            ['name' => 'Avena', 'crop_group' => 'Herbáceos'],
            ['name' => 'Cebada', 'crop_group' => 'Herbáceos'],
            ['name' => 'Mazin "Ciclo 700"', 'crop_group' => 'Herbáceos'],
            ['name' => 'Trigo', 'crop_group' => 'Herbáceos'],

            // Hortalizas
            ['name' => 'Ajo morado', 'crop_group' => 'Hortícolas'],
            ['name' => 'Ajo Spring', 'crop_group' => 'Hortícolas'],
            ['name' => 'Cebolla', 'crop_group' => 'Hortícolas'],
            ['name' => 'Maíz Dulce "Ciclo 500"', 'crop_group' => 'Hortícolas'],
            ['name' => 'Patata', 'crop_group' => 'Hortícolas'],

            // Lenosos
            ['name' => 'Almendro Espaldera "Lauranne" "Zona Mancha"', 'crop_group' => 'Lenosos'],
            ['name' => 'Almendro Espaldera "Penta" "Zona Hellín"', 'crop_group' => 'Lenosos'],
            ['name' => 'Almendro "Lauranne" "Zona Mancha"', 'crop_group' => 'Lenosos'],
            ['name' => 'Almendro "Penta" "Zona Hellín"', 'crop_group' => 'Lenosos'],
            ['name' => 'Olivo espaldera "Zona Hellín"', 'crop_group' => 'Lenosos'],
            ['name' => 'Olivo espaldera "Zona Mancha"', 'crop_group' => 'Lenosos'],
            ['name' => 'Olivo vaso "Zona Hellín"', 'crop_group' => 'Lenosos'],
            ['name' => 'Olivo vaso "Zona Mancha"', 'crop_group' => 'Lenosos'],
            ['name' => 'Vid Macabeo', 'crop_group' => 'Lenosos'],
            ['name' => 'Vid Monastrell', 'crop_group' => 'Lenosos'],
            ['name' => 'Vid Syrah', 'crop_group' => 'Lenosos'],

            ];
           
        DB::table('crops')->insert($crops);
    }
}
