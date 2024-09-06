<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'titulo' => 'Primer post del blog',
                'contenido' => 'Este es el contenido del primer post.',
                'id_autor' => 1, // Asumimos que el autor con ID 1 existe
                'estado' => 'publicado',
                'imagen' => "imagen_1.jpg",
            'ruta_imagen' => "assets/imagen/post/imagen_1.jpg",
                'fecha_publicacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Segundo post del blog',
                'contenido' => 'Este es el contenido del segundo post.',
                'id_autor' => 2, // Asumimos que el autor con ID 2 existe
                'estado' => 'borrador',
                'imagen' => "imagen_2.jpg",
            'ruta_imagen' => "assets/imagen/post/imagen_2.jpg",
                'fecha_publicacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Primer post del blog',
                'contenido' => 'Este es el contenido del primer post.',
                'id_autor' => 3, // Asumimos que el autor con ID 1 existe
                'estado' => 'publicado',
                'imagen' => "imagen_3.jpg",
            'ruta_imagen' => "assets/imagen/post/imagen_3.jpg",
                'fecha_publicacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
