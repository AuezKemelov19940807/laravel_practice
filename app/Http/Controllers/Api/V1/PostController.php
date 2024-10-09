<?php


namespace  App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        // API метод для получения всех постов
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show(int $id)
    {

        $post = Post::find($id);
        return response()->json($post);
    }

    public function name(string $name = null )
    {
        $post = Post::where('name', $name)->first();

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    public function showBySlug(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

}
