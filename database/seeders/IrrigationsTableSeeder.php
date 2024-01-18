<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrrigationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('irrigations')->truncate();

         $irrigations = [
             
            ['name' => 'Riego Directo'],
            ['name' => 'Riego por Acumulación'],

            ];
           
        DB::table('irrigations')->insert($irrigations);
    
    }
}
