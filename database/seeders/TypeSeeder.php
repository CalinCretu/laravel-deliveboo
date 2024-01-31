<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'name' => 'Italiano',
            'slug' => 'italiano',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Cinese',
            'slug' => 'cinese',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Vegetariano',
            'slug' => 'vegetariano',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Messicano',
            'slug' => 'messicano',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Giapponese',
            'slug' => 'giapponese',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Pizzeria',
            'slug' => 'pizzeria',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Francese',
            'slug' => 'francese',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Spagnolo',
            'slug' => 'spagnolo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('types')->insert([
            'name' => 'Greco',
            'slug' => 'greco',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
