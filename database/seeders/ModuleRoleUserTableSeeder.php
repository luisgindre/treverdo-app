<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ModuleRoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /*  DB::table('soils')->truncate(); */

       DB::table('module_role_user')->truncate();

       $module_role_user = [
           
          ['user_id' => '1', 'role_id' => '1', 'module_id' => '1', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '1', 'role_id' => '1', 'module_id' => '2', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '2', 'role_id' => '1', 'module_id' => '1', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '2', 'role_id' => '1', 'module_id' => '2', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '3', 'role_id' => '1', 'module_id' => '1', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '3', 'role_id' => '1', 'module_id' => '2', 'user_role_module_since' => Carbon::now()],
          ['user_id' => '4', 'role_id' => '2', 'module_id' => '2', 'user_role_module_since' => Carbon::now()],
          
          ];
         
      DB::table('module_role_user')->insert($module_role_user);
    
    }
}
