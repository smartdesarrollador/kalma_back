<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
    [
        'id_articulo' => 1, // Asumimos que el post con ID 1 existe
        'nombre_comentarista' => 'Usuario1',
        'contenido' => 'Este es un comentario en el primer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 1,
        'nombre_comentarista' => 'Usuario2',
        'contenido' => 'Este es otro comentario en el primer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 2,
        'nombre_comentarista' => 'Usuario3',
        'contenido' => 'Este es un comentario en el segundo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 2,
        'nombre_comentarista' => 'Usuario4',
        'contenido' => 'Este es otro comentario en el segundo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 3,
        'nombre_comentarista' => 'Usuario5',
        'contenido' => 'Este es un comentario en el tercer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 3,
        'nombre_comentarista' => 'Usuario6',
        'contenido' => 'Este es otro comentario en el tercer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 4,
        'nombre_comentarista' => 'Usuario7',
        'contenido' => 'Este es un comentario en el cuarto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 4,
        'nombre_comentarista' => 'Usuario8',
        'contenido' => 'Este es otro comentario en el cuarto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 5,
        'nombre_comentarista' => 'Usuario9',
        'contenido' => 'Este es un comentario en el quinto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 5,
        'nombre_comentarista' => 'Usuario10',
        'contenido' => 'Este es otro comentario en el quinto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 6,
        'nombre_comentarista' => 'Usuario11',
        'contenido' => 'Este es un comentario en el sexto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 6,
        'nombre_comentarista' => 'Usuario12',
        'contenido' => 'Este es otro comentario en el sexto post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 7,
        'nombre_comentarista' => 'Usuario13',
        'contenido' => 'Este es un comentario en el séptimo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 7,
        'nombre_comentarista' => 'Usuario14',
        'contenido' => 'Este es otro comentario en el séptimo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 8,
        'nombre_comentarista' => 'Usuario15',
        'contenido' => 'Este es un comentario en el octavo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
