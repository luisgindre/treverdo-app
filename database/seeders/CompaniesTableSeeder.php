<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->truncate();

         $companies = [
             
            ['name' => 'Treverdo', 'company_adress' => 'José Abascal 56, planta 2da', 'company_mail' => 'mglucca@treverdo.es'],
            ['name' => 'Mancha', 'company_adress' => 'donde quede', 'company_mail' => 'algo@algo.es'],

            ];
           
        DB::table('companies')->insert($companies);
    }
}
