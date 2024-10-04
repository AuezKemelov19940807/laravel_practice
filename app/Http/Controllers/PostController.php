<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // API метод для получения всех постов
        $posts = Post::all();
        return response()->json($posts);
    }

    public function adminIndex()
    {
        // Метод для отображения всех постов в админке
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
}
