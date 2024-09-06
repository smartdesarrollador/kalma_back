<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        // Obtener todos los comentarios
        $comments = Comment::with('post')->get();
        return CommentResource::collection($comments);
    }

    public function create()
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
    {
       // Validar los datos enviados
        $validatedData = $request->validate([
            'id_articulo' => 'required|exists:posts,id', // Verifica que el post relacionado existe
            'nombre_comentarista' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_comentario' => 'required|date', // Asegurarse que es una fecha válida
        ]);

        // Crear el comentario
        $comment = Comment::create([
            'id_articulo' => $validatedData['id_articulo'],
            'nombre_comentarista' => $validatedData['nombre_comentarista'],
            'contenido' => $validatedData['contenido'],
            'fecha_comentario' => $validatedData['fecha_comentario'],
        ]);

        // Retornar el comentario recién creado usando el CommentResource
        return new CommentResource($comment);
    }

    public function show(Comment $comment)
    {
        // Retornar el comentario específico
        return new CommentResource($comment->load('post'));
    }

    public function edit(Comment $comment)
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Comment $comment)
    {
        // Validar los datos enviados
        $validatedData = $request->validate([
            'id_articulo' => 'required|exists:posts,id', // Verifica que el post relacionado existe
            'nombre_comentarista' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_comentario' => 'required|date', // Asegúrate de que es una fecha válida
        ]);

        // Actualizar el comentario con los datos validados
        $comment->update([
            'id_articulo' => $validatedData['id_articulo'],
            'nombre_comentarista' => $validatedData['nombre_comentarista'],
            'contenido' => $validatedData['contenido'],
            'fecha_comentario' => $validatedData['fecha_comentario'],
        ]);

        // Retornar el comentario actualizado usando el CommentResource
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        // Eliminar el comentario
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
