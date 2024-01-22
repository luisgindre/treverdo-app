<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();

         $roles = [
             
            ['name' => 'Admin', 'role_description' => 'Administrador del sistema'],
            ['name' => 'Vendedor', 'role_description' => 'Carga Clientes y sus datos del módulo de Riego Solar, orientado a Mancha'],

            ];
           
        DB::table('roles')->insert($roles);
    }
}
