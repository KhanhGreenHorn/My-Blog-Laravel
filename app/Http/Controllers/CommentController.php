<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);
        return back();
    }

    public function destroy(Post $post, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }
}
