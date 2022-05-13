<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return(view('register.create'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|max:255'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success','User has been successfully created');

        return redirect('/');
    }
}
