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
       DB::table('users')->truncate();

        User::create([
        'name' => 'admin',
        'email' => 'admin@admin',
        'password' => Hash::make('admin'),
        'last_name' => 'admin',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);

    User::create([
        'name' => 'Oscar',
        'email' => 'garciave@treverdo.es',
        'password' => Hash::make('oscar'),
        'last_name' => 'Garcia Velazco',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);

    User::create([
        'name' => 'Martin',
        'email' => 'mglucca@treverdo.es',
        'password' => Hash::make('martin'),
        'last_name' => 'Lucca',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);

    User::create([
        'name' => 'Juan',
        'email' => 'juanagente@admin',
        'password' => Hash::make('juan'),
        'last_name' => 'Agente',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);
    }
}
