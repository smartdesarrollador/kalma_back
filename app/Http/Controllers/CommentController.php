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
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre_comentarista' => 'required|string|max:255',
            'contenido' => 'required|string',
            'id_articulo' => 'required|exists:posts,id',
            'fecha_comentario' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear el comentario
        $comment = Comment::create([
            'nombre_comentarista' => $request->nombre_comentarista,
            'contenido' => $request->contenido,
            'id_articulo' => $request->id_articulo,
            'fecha_comentario' => $request->fecha_comentario ?? now(),
        ]);

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
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre_comentarista' => 'sometimes|required|string|max:255',
            'contenido' => 'sometimes|required|string',
            'fecha_comentario' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar los datos del comentario
        $comment->update($request->only(['nombre_comentarista', 'contenido', 'fecha_comentario']));

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        // Eliminar el comentario
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
