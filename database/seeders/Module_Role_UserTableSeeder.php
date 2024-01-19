<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Module_Role_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('module_role_user')->truncate();

         $module_role_user = [
             
            ['user_id' => '1', 'role_id' => '1', 'module_id' => '1', 'user_role_since' => '2024-01-18', 'user_grantor_id' => '1'],
            ['user_id' => '2', 'role_id' => '1', 'module_id' => '1', 'user_role_since' => '2024-01-18', 'user_grantor_id' => '1'],
            ['user_id' => '3', 'role_id' => '1', 'module_id' => '1', 'user_role_since' => '2024-01-18', 'user_grantor_id' => '1'],
            

            ];
           
        DB::table('module_role_user')->insert($module_role_user);
    }
}
