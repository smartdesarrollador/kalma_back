<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->get();
        return PostResource::collection($posts);

        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $post = Post::with(['autor', 'comentarios', 'categorias', 'tags'])->findOrFail($id);
        $postResource = new PostResource($post);

        /* dd($postResource);  */ // Esto hará un dump del JSON que generará PostResource

        return $postResource;
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
