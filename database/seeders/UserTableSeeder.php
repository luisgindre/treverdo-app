<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /*  DB::table('soils')->truncate(); */

        User::create([
        'name' => 'admin',
        'email' => 'admin@admin',
        'password' => Hash::make('admin'),
        'last_name' => 'Gindre',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);
    }
}
