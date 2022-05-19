<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required',
        ]);

        $post = Post::findOrFail(request('post_id'));

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);
        return back();
    }

    public function edit($id){
        return view('comment.update', [
            'comment' => Comment::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $comment = Comment::findOrFail($id);

        $comment->body = request('body');

        $comment->save();

        return view('posts.post',[
            'post' => $comment->post()->first()
        ]);
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return back();
    }
}
