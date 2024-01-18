<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->truncate();

         $modules = [
             
            ['name' => 'Admin'],
            ['name' => 'Riego Solar'],

            ];
           
        DB::table('modules')->insert($modules);
    }
}
