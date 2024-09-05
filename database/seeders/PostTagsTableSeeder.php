<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_tags')->insert([
            [
                'id_articulo' => 1, // Asumimos que el post con ID 1 existe
                'id_etiqueta' => 1, // Asumimos que la etiqueta con ID 1 existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_articulo' => 2, // Asumimos que el post con ID 2 existe
                'id_etiqueta' => 2, // Asumimos que la etiqueta con ID 2 existe
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
