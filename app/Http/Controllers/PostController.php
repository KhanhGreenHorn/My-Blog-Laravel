<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\ClearImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }


    public function show($id)
    {
        return view('posts.post', [
            'post' => Post::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $attributes =  $request->validate([
            'title' => 'required|unique:posts',
            'thumbnail' => 'image',
            'note' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (request()->hasFile('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $user = auth()->user();
        $user->posts()->create($attributes);

        return redirect('/');
    }

    public function edit($id)
    {
        return view('posts.update', [
            'post' => Post::find($id)
        ]);
    }

    public function update($id)
    {

        $attributes =  request()->validate([
            'title' => 'required',
            'note' => 'required',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $attributes['title'];
        if (request()->hasFile('thumbnail')) {
            $post->thumbnail = request()->file('thumbnail')->store('thumbnails');
        }
        $post->note = $attributes['note'];
        $post->body = $attributes['body'];

        $post->save();

        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/');
    }
}
