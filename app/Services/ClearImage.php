<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ClearImage
{
    public static function clear()
    {
        $post = Post::find(23);
        dd($post->thumbnail);
        $image = substr($post->thumbnail, 11);
        //dd($image);
        dd(Storage::disk('public')->exists($image));

        $posts = Post::all();

        foreach ($posts as $post) {
            substr($post->thumbnail, 11);
        }
    }
}
