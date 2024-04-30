<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        DB::table('users')->insert([
            'name' => 'denis',
            'email' => 'denis@denis.com',
            'password' => Hash::make('password'),
            'cep'=>'13033195',
            'role'=>'user',
        ]);

        DB::table('users')->insert([
            'name' => 'magas',
            'email' => 'magas@nerd.com',
            'password' => Hash::make('password'),
            'cep'=>'13324340',
            'role'=>'user',
        ]);

        DB::table('users')->insert([
            'name' => 'berti',
            'email' => 'berti@TFT.com',
            'password' => Hash::make('password'),
            'cep'=>'13087570',
            'role'=>'user',
        ]);

        DB::table('users')->insert([
            'name' => 'guto',
            'email' => 'guto@gigantesco.com',
            'password' => Hash::make('password'),
            'cep'=>'13569530',
            'role'=>'user',
        ]);

        DB::table('users')->insert([
            'name' => 'matue',
            'email' => 'matue@matue.com',
            'password' => Hash::make('password'),
            'cep'=>'13275354',
            'role'=>'user',
        ]);

        DB::table('users')->insert([
            'name' => 'xastre',
            'email' => 'xastre@admin.com',
            'password' => Hash::make('saopaulo'),
            'cep'=>'13199358',
            'role'=>'admin',
        ]);
    }
}
