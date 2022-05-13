<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.blog', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
        ]);
    }
  

    public function show(Post $post)
    {
        return view('posts.post',[
            'post' => $post,
        ]);
    }
}
