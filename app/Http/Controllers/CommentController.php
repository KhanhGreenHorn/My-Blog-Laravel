<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CommentController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
            'image' => 'image'
        ]);

        $post = Post::findOrFail(request('post_id'));

        if (request()->hasFile('image')) {
            $attributes['image'] = request()->file('image')->store('cmtImages');
        }

        $attributes['user_id'] = auth()->user()->id;
        $post->comments()->create($attributes);
        return back();
    }

    public function edit($id)
    {
        return view('comment.update', [
            'comment' => Comment::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->body = request('body');

        if (request()->hasFile('image')) {
            $comment->image = request()->file('image')->store('cmtImages');
        }

        $comment->save();

        return view('posts.post', [
            'post' => $comment->post()->first()
        ]);
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return back();
    }
}
