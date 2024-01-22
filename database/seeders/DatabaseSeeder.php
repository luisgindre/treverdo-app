<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CompaniesTableSeeder::class);
        $this->call(CropsTableSeeder::class);
        $this->call(IrrigationsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(SoilsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
