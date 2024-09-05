<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public function index()
    {
        // Obtener todos los posts con las relaciones cargadas
        $posts = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->get();
        return PostResource::collection($posts);
    }

    public function create()
    {
        // Generalmente, en una API RESTful, esta función no se utiliza,
        // ya que la creación de un recurso suele manejarse en el frontend.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'id_autor' => 'required|exists:users,id',
            'estado' => 'required|in:publicado,borrador',
            'fecha_publicacion' => 'nullable|date',
            'categorias' => 'array',
            'categorias.*' => 'exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear el post
        $post = Post::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'id_autor' => $request->id_autor,
            'estado' => $request->estado,
            'fecha_publicacion' => $request->fecha_publicacion,
        ]);

        // Sincronizar categorías y etiquetas si están presentes
        if ($request->has('categorias')) {
            $post->categorias()->sync($request->categorias);
        }

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return new PostResource($post);
    }

    public function show($id)
    {
        // Obtener un post específico con las relaciones cargadas
        $post = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->findOrFail($id);
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        // Similar a `create`, este método generalmente no se utiliza en una API RESTful,
        // ya que la edición de un recurso suele manejarse en el frontend.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, Post $post)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'titulo' => 'sometimes|required|string|max:255',
            'contenido' => 'sometimes|required|string',
            'id_autor' => 'sometimes|required|exists:users,id',
            'estado' => 'sometimes|required|in:publicado,borrador',
            'fecha_publicacion' => 'nullable|date',
            'categorias' => 'array',
            'categorias.*' => 'exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar los campos del post si están presentes en el request
        $post->update($request->only(['titulo', 'contenido', 'id_autor', 'estado', 'fecha_publicacion']));

        // Sincronizar categorías y etiquetas si están presentes
        if ($request->has('categorias')) {
            $post->categorias()->sync($request->categorias);
        }

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        // Eliminar el post y sus relaciones con categorías y etiquetas
        $post->categorias()->detach();
        $post->tags()->detach();
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
