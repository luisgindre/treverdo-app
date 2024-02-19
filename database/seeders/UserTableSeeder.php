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
        'name' => 'Juan',
        'email' => 'juanprueba@admin',
        'password' => Hash::make('jp123456'),
        'last_name' => 'Prueba',
        'enabled' => TRUE,
        'user_id' => 1,
    ]);
    }
}
