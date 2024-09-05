<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_categories')->insert([
            [
                'id_post' => 1,  // Asumimos que el post con ID 1 existe
                'id_categoria' => 1,  // Asumimos que la categoría con ID 1 existe
            ],
            [
                'id_post' => 1,
                'id_categoria' => 2,  // El post con ID 1 pertenece también a la categoría 2
            ],
            [
                'id_post' => 2,  // El post con ID 2 existe
                'id_categoria' => 1,  // El post con ID 2 pertenece a la categoría 1
            ]
        ]);
    }
}
