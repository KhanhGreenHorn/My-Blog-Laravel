<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts.blog', [
            'posts' => $category->posts,
        ]);
    }


    public function create(Request $request)
    {
        return view('category.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Category::create($attributes);

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request['category_id']);
        $category->delete();
        return redirect('/');
    }
}
