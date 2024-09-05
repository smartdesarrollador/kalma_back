<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nombre' => 'Tecnología',
                'descripcion' => 'Artículos relacionados con tecnología',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ciencia',
                'descripcion' => 'Artículos relacionados con ciencia',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
