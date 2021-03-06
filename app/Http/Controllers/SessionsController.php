<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');
        }

        return back()->withInput()
            ->withErrors(['email' => 'your provided credentials could not be verified']);
    }


    public function destroy()
    {
        auth()->logout();

        request()->session()->invalidate();
 
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
