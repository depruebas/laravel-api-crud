<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;

class PostsController extends Controller
{
    #  Lista todos los posts
    public function index()
    {
        return new PostCollection( Post::paginate(10));
    }

    # Lista un post en específico
    public function show(Post $post)
    {
        return new PostResource( $post);
    }

    # Guardar el post
    public function store( Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255',
            'enabled' => 'required|integer|min:0',
        ]);

        $post = Post::create( $validated);

        return new PostResource( $post);
    }

    # Actualizar un post
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255',
            'enabled' => 'required|integer|min:0',
        ]);

        $post->update($validated);

        return new PostResource($post);
    }

    # Eliminar un post
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([ "code" => "1", "message" => "Post eliminado correctamente"], 200);
    }
}
